<?php

namespace App\Models;
use App\Models\Transaction;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Wallet;
use App\Models\Beneficiary;
use App\Models\Spouse;
// to use the Africas Talking
// use Illuminate\Support\Facades\Mail;
// use App\Mail\ApplicationFeedback;
// use App\Mail\ApprovalMail;
// use PDF;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phoneNumber',
        'password',
        'idDocument',
        'passportNumber',
        'location',
        'accNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createNewUser($request )
    {

        // dd($request);
        $user = new User;
        $user->name = $request['fName'].' '.$request['lName'];
        $user->email =$request['idNumber'];
        $user->fundType = 'null';
        $user->idNumber = $request['idNumber'];
        $user->password =Hash::make($request['otp']);
        $user->address= $request['fward'].','.$request['fsubcounty'].','.$request['fcounty'].' County';
        // $user->chiefsLttr =$request['chiefsLttr'];
        $user->phoneNumber = $request['phoneNumber'];
        // #get the  files
        $chiefsLttr   = $request->file('chiefsLttr');
        $idScan = $request->file('fidScan');
        $bidScan = $request->file('bidScan');
        // #store em
        $user->chiefsLttr = $chiefsLttr->storeAs('public/'. $request['idNumber'], 'chfslter.pdf');
        $user->idScan = $idScan->storeAs('public/'. $request['idNumber'], 'identification.pdf');
        $user->bidScan = $bidScan->storeAs('public/'. $request['idNumber'], 'identification.pdf');

        $user->save();



        #we add the momter
        $spouse = new Spouse;
        $spouse->create($request,$user->id);

        #here we shall add the beneficiary manenoz
        $beneficiary = new Beneficiary;
        $beneficiary->create($request,$user->id);         
   
        return $user;
    }

       
         
    // }
    public function resendOtp(Type $var = null)
    {
        # code...
    }
   

    public function getAllUsers()
    {
        $users['activeUsers']=$this->where('accountStatus','active')->get();
        $users['inactiveUsers']=$this->where('accountStatus','inactive')->get();
        $users['dormantUsers']=$this->where('accountStatus','dormant')->get();
        $users['pendingUsers']=$this->where('accountStatus','pending');
        return $users;
    }
    
    public function rejectClient($request)
    {
        # code.
        $rejectedClient = $this->find($request->id);
        // dd($rejectedClient);
        Mail::to($rejectedClient->email)->send(new ApplicationFeedback($rejectedClient,$request->message)); 
        $rejectedClient->wallet->delete();
        $rejectedClient->delete();
        return;
    }

    public function approveClient($id)
    {
        # code...
        $acceptedClient = $this->find($id);
        $acceptedClient->accountStatus = 'dormant';
        $password = rand(100000,999999);
        $acceptedClient->password = Hash::make($password);
        $acceptedClient->save();
        // Mail::to($acceptedClient->email)->send(new ApprovalMail($acceptedClient,$password));
        return ; 

    }
    
    public function newUSerAccount($token)
    {
        try {
            //code...
            return  $this->where('remember_token', $token);        
        } catch (\Throwable $th) {
            return false;
        }
    }
    #get fathers info
    function getUserWithId($idNo)  {
        $user = $this->where('idNumber','=',$idNo)->get();
        return $user;
    }
    #this validates the various fields
    function validate($fieldName,$value){
        return $this->where($fieldName,'=',$value)->first();
         
     }
    public function spouse() {
        return $this->hasOne('App\Models\Spouse','mainId');
    }

    public function beneficiaries() {
        return $this->hasMany('App\Models\Beneficiary','mainId');
    }

    public function assignedAgent()
    {
        return $this->belongsTo("App\Models\Agent","agentId");
    }

    public function wallet()
    {
        return $this->hasOne("App\Models\Wallet","userId");
    }
    public function notifications()
    {
        return $this->hasMany("App\Models\Notification","recipientId");
    }
    public function myTransactions()
    {
        return $this->hasMany("App\Models\Transaction","recipientId");
    }
    public function transactions()
    {
        return $this->hasMany("App\Models\Transaction","senderId");
    }
}
