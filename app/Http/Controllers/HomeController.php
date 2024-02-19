<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\FirstRegistration;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\AcknowledgementMail;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Transaction;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Beneficiary;
use App\Models\County;
use Illuminate\Support\Facades\Redis;
use App\Models\Validator;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth',['except' => ['firstRegistration','otp','fieldValidator',
                            'validator','beneficiaryRegistration','getLocations']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {   

            return view('home');
        
    }

    public function dashBoard()
    {
        return view('home');
    }
    public function homeDash()
    {
        return view('home');
    }

    public function notifications(Notification $notification)
    {
        $notifications = $notification->allNotifications();
        return view("notifications.index")->with("notifications", $notifications);
    }

    
    function firstRegistration(FirstRegistration $request)
    {
        // dd($request);
        $user = new User;
        $user = $user->createNewUser($request);        
        return back()->withSuccess("Please use Your OTP as your password.");       

    }

    public function resendOtp(User $user)
    {
        return ($user->resendOtp());        
    }

   

    public function users(Request $request,User $user)
    {
        $users = $user->getAllUsers();
        // return $users;
        return view('users.index')->with("users",$users);


    }
    public function profile()
    {
        # code...
        return view("users.profile");
    }

    public function wallet(Type $var = null)
    {
        # code...
        $allTransactions= Transaction::where("type","withdarawal")->where("status", 'pending')->get();
        return view('wallet.index')->with("allTransactions",$allTransactions);
    }
    #to be changed to the bursary application
    function rejectClient(User $user,Request $request)
    {
        # code.
        // dd( $request);
        $user->rejectClient($request);
        #To return Flash Message 
        return back()->withSuccess("Operation was  Successfully Completed");       

    }
    public function approveClient(User $user, $id)
    {
        $user->approveClient($id);
        return back()->withSuccess("Operation was  Successfully Completed, The Client has been Contacted.");       
    }
    
    public function download($id ,$fileName) {
        $file = "../storage/app/public/".$id."/".$fileName;
        $headers =[
            "Content-Type" =>"application/".explode('.',$fileName)[1]
        ];
        return Response::download($file,$fileName,$headers);
    }
    public function readNotification(Notification $notification,$id)
    {
        # code...
        $notification->markAsRead($id);
        return back()->withSuccess("The notification is now Marked As Read");
    }

    #this will handle the otp sending
    public function otp($message,$phoneNumber) {
        #this is the function to send it
        $userName = 'sandbox';
        $key      =  env('AFR_TALKING');
        $AT = new AfricasTalking($userName,$key);
        $smsService = $AT->sms();
        $result = $smsService->send(
            [
                'to' => $phoneNumber,
                'message'=>$message,
                'from'=>'Bursary Sys - OTP'
            ]
            );
        return $result;
    }
    // this is for validating the id number.
    function validator($idNo)  {
        $user = new User;
        $data = $user->getUserWithId($idNo)->first();
        return ($data == null ? 'Null' : $data);
        
    }

    function beneficiaryRegistration(Request $request){
        $beneficiary = new Beneficiary;
        $beneficiary->create($request);
        #this will handle the storage
        return back()->withSuccess("Please use Your Original OTP as your password.");       

    }

    function getLocations()  {
        $county = new County;
        return $county->getAll();
    }

    function fieldValidator($modelName,$fieldName,$value){
        $validator = new Validator;
        return $validator->validator($modelName,$fieldName,$value);
    }


}
