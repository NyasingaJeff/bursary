<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function newNotification($request)
    {
       Notification::create([
            'type'          =>  $request['type'],
            'senderId'      =>  $request['senderId'],
            'recipientId'   =>  $request['recipientId'],
            'status'        =>  "unread",
            'message'       =>  $request['message'],
            'transactionId' =>  $request['transactionId']
        ]);
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->status ='read';
        $notification->save();
    }
    public function allNotifications(Type $var = null)
    {
        return auth()->user()->notifications->reverse();
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "recipientId");
    }
    public function transaction()
    {
        #this will be used in the mail...
        return $this->belongsTo("App\Models\Transaction","transactionId");

    }
}

