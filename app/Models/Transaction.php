<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function sendMoney($request)
    {
        $recipient = User::where("accNumber",$request->accNumber)->first();

        if ($recipient != null && $recipient->wallet->balance >= $request->minAmount) {

            // return $recipient->id;
            $transaction = Transaction::create([
                "type"        =>  "send",
                "amount"      =>  $request->amount,
                "senderId"    =>  auth()->user()->id,
                "recipientId" =>  $recipient->id
            ]);

            // notify the sender
            Notification::newNotification([
                "transactionId"=>$transaction->id,
                "senderId" => auth()->user()->id,
                "recipientId" => $transaction->sender->id,
                "type"   => "transfer",
                "message"=> "The request for money transfer has successfully been recieved. Please await the feedback. Thank You."
                ]);
            // notify the reciever
            Notification::newNotification([
                "transactionId"=>$transaction->id,
                "senderId" => auth()->user()->id,
                "recipientId" => $recipient->id,
                "type"   => "transfer",
                "message"=> " You have a request to Recieve $  ".$request->amount." Please Respond as soon as posible."
                ]);
            return ("Success");
        } else if($recipient == null) {
            # incase the credentials provided do not add up or the user does not exist
            #make a transaction that will have an hold status
            $transaction = Transaction::create([
                "type"        =>  "send",
                "amount"      =>  $request->amount,
                "senderId"    =>  auth()->user()->id,
                "recipientId" =>  null,
                "status"      => "onHold",

            ]);
            Notification::newNotification([
                "transactionId"=>$transaction->id,
                "senderId" => 1,
                "recipientId" => auth()->user()->id,
                "type"   => "transfer",
                "message"=> "The request to transfer $ " .$request->amount." to ".$request->email." was not successfull since we do not have the user in our records \n Please Check on the email credentials You provided and try again.Thank You."
                ]);
            return ("Not Found.");

        }else if($recipient->wallet->balance < $request ->minAmount){

            $transaction = Transaction::create([
                "type"        =>  "send",
                "amount"      =>  $request->amount,
                "senderId"    =>  auth()->user()->id,
                "recipientId" =>  $recipient->id,
                "status"      => "onHold",
            ]);
            #make a transaction that will be pending till cient tops up thhe account is topped up
             Notification::newNotification([
                 "transactionId"=>$transaction->id,
                    "senderId" => auth()->user()->id,
                    "recipientId" => $recipient->id,
                    "type"   => "transfer",
                    "message"=> "There is an incoming transaction of " .$request->amount." From ".auth()->user()->name." Passport Number".auth()->user()->passportNumber." email address".auth()->user()->email." But your account balance is below the required amount of".$request->minAmount - $recipient->wallet->balance." Please Top up.Thank You."
                    ]);
            return ("Balance Low");
        }


    }
    public function recieveMoney($id)
    {
        $transaction = Transaction::find($id);
        if($transaction->status != "pending" &&  $transaction->status != "onHold")
        {
            return back()->withFail( "The The Trasaction cannot be Completed since it was already rejected or reversed.");
        }else{

            $this->complete($transaction);
            // notify the Admin
            Notification::newNotification([
                "transactionId"=>$transaction->id,
                "senderId" => auth()->user()->id,
                "recipientId" => 1,
                "type"   => "recieveMoney",
                "message"=> "The Money transfer of $ ".$transaction->amount ." that happened on ".$transaction->created_at."to".ucfirst($transaction->recipient->name)." , email ".$transaction->recipient->email." was completed successfully."
            ]);
        // notify the sender
            Notification::newNotification([
                "transactionId"=>$transaction->id,
                "senderId"=>1,
                "recipientId" => $transaction->senderId,
                "type"   => "recieveMoney",
                "message"=> "The transaction initiated on ".$transaction->created_at." of USD ".$transaction->amount." by ".$transaction->sender->name." email : ".$transaction->sender->email." Was Successfully Recieved By ".ucfirst($transaction->recipient->name)." \n Thank You."
            ]);

        }


    }
    public function requestWithdrawal($request)
    {
        $transaction = Transaction::create([
            "type"              =>  "withdrawal",
            "amount"            =>  $request->amount,
            "senderId"          =>  auth()->user()->id,
            "recipientId"       =>  1,
            "bank"              =>  $request->bank,
            "accNumber"         =>  $request->accNumber,
            "beneficiaryName"   =>  $request->beneficiaryName,
            "beneficiaryAddress"=>  $request->beneficiaryAddress,
            "narrative"         =>  $request->narrative,
            "amount"            =>$request->amount


        ]);
        // notify the sender
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId" => auth()->user()->id ,
            "recipientId" => 1,
            "type"   => "withdrawalRequest",
            "message"=> $request->narrative,
            ]);
        // notify the Admin
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId" =>  1,
            "recipientId" => auth()->user()->id,
            "type"   => "withdrawalRequest",
            "message"=> "The request for money withdrawal has been submited. Please await the feedback from the Admin. Thank You."
            ]);
        // return Notification::all();

    }

    public function approveWithDrawal($request)
    {
        $transaction = Transaction::find($request->withdrawalRequestId);
        $transaction->complete();
        // notify the requester
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "userId" => $transaction->senderId,
            "type"   => "withdrawalApproval",
            "message"=> "The request for money withdrawal on ".$transaction->amount." on ".$transaction->created_at." Was Succesfull. The balance is expected to reflect in Your wallet utmost after Seventy Two Hours Thanks for choosing Prestige Bnak and Trust."
            ]);


        // notify the Admin
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "userId" => 1,
            "type"   => "withdrawalApproval",
            "message"=> "The Cient has been alerted of Your Approval."
            ]);
    }

    public function complete(  $transaction)
    {
        # code...
        $reciever = User::find($transaction->recipientId);

        switch ($transaction->type) {
            #since the client is doing this on his or her own no recipient is necesary
            case 'withdrawal':
                $reciever->wallet->balance -=$transaction->amount;
                $transaction->status = "complete";
                $transaction->save();
                break;

            case 'deposit':
                #since the client is doing this on his or her own no recipient is necesary
                $reciever->wallet->balance +=$transaction->amount;
                $transaction->status = "complete";
                $transaction->save();
                break;

            case 'send':
                // in the case of client to client
                if ($transaction->sender->id != 1) {
                    $transaction->sender->wallet->balance -=$transaction->amount;
                    $transaction->sender->wallet->save();
                }
                #To bank account
                $reciever->wallet->balance +=$transaction->amount;
                $reciever->wallet->save();

                $transaction->status = "complete";
                $transaction->save();
                break;

            case 'reversal':
                #To bank account
                $reciever->wallet->balance -=$transaction->amount;
                $reciever->wallet->save();
                $transaction->status = "reversed";
                $transaction->save();
                break;


            case 'send':
                #To bank account
                if ($transaction->senderId != 1) {
                    $sender = User::find($transaction->senderId);
                    $sender->wallet->balance -= $transaction->amount;
                }
                $reciever->wallet->balance +=$transaction->amount;
                $reciever->wallet->save();
                $transaction->status = "complete";
                $transaction->save();
                break;

            default:
                # code...
                break;
        }
    }


    public function denyWithDrawal($request)
    {

        $transaction = Transaction::find($request->withdrawalRequestId);
        $transaction->status="cancelled";
        $transaction->save();
        // notify the requester
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "userId" => $transaction->senderId,
            "type"   => "withdrawalApproval",
            "message"=> "The request for money withdrawal on ".$transaction->amount." on ".$transaction->created_at." Was Not Succesfull. Because of  \n. " .$request->reason
            ]);


        // notify the Admin
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId"=>1,
            "recipientId" => 1,
            "type"   => "withdrawalApproval",
            "message"=> "Your feedback has been sent over to the client."
            ]);
    }


    public function rejectransfer($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->status="rejected";
        $transaction->save();
        // notify the requester
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId" => $transaction->recipientId,
            "recipientId"=> $transaction->senderId,
            "type"   => "rejection",
            "message"=> "The Transaction of ".$transaction->amount."that happened on ".$transaction->created_at." Was Not SuccessFull.The user Turn it down"
            ]);


        // notify the Admin
        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId" => $transaction->recipientId,
            "recipientId"=> 1,
            "type"   => "rejection",
            "message"=> "The Transaction of ".$transaction->amount."that happened on ".$transaction->created_at." Was Not SuccessFull. The Client rejected the request"
            ]);
    }

    public function reverse($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->status = 'reversed';
        $transaction->save();
        $transaction->recipient->wallet->balance -= $transaction->amount;
        $transaction->recipient->wallet->save();
        $transaction->sender->wallet->balance += $transaction->amount;
        $transaction->sender->wallet->save();

        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId" => 1,
            "recipientId"=> $transaction->recipientId,
            "type"   => "rejection",
            "message"=> "The Transaction of ".$transaction->amount." that happned on ".$transaction->created_at." Has been Reversed. Your account has been deducted ".$transaction->amount." Consult the Admin For more details."
            ]);

        Notification::newNotification([
            "transactionId"=>$transaction->id,
            "senderId" => 1,
            "recipientId"=> $transaction->recipientId,
            "type"   => "rejection",
            "message"=> "The Transaction of ".$transaction->amount." that happned on ".$transaction->created_at." Has been Reversed. Your account has been Debited ".$transaction->amount." Consult the Admin For more details."
            ]);
    }



    public function getAllTransactions(Type $var = null)
    {
        $currentUserId = auth()->user()->id;
        if ($currentUserId ==1 ) {
            $transactions = Transaction::all();
        }else{
            $transactions = Transaction::where("senderId",$currentUserId)->orWhere("recipientId",$currentUserId)->get();
        }
        return $transactions;
    }

    public function sender(Type $var = null)
    {
        return $this->belongsTo("App\Models\User","senderId");
    }

    public function recipient(Type $var = null)
    {
        return $this->belongsTo("App\Models\User","recipientId");
    }
    public function notifications(Type $var = null)
    {
        # code...
        return $this->hasMany("App\Models\Notification", "transactionId");
    }
}
