<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Transaction $transaction)
    {
        $transactions = $transaction->getAllTransactions();
        return view('transactions.index')->with("transactions",$transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function withdrawalRequest(Request $request, Transaction $transaction)
    {
        $transaction->requestWithdrawal($request);
        return back()->with('success' , 'Your submission was successfull submitted to the Admin');

    }

    public function sendTransaction(Request $request, Transaction $transaction)
    {
        $feedback = $transaction->sendMoney($request);

        switch ($feedback) {
            case 'Success':
                # code...
                return back()->with("success","The transaction Completed succssfully");
                break;
            case 'Not Found.':
                # code...
                return back()->with("fail","The bank account Entered Does Not Exist");
                break;
            case 'Balance Low':
                # code...
                return back()->with("fail","The bankl account Entered Does have the Minimum Balance needed For this Transaction.");
                break;
        }

    }

 

    public function recieveTransaction($id, Transaction $transaction)
    {   
        //  return ($id);
        $transaction->recieveMoney($id);
        return back()->with('success' , 'Your Successfully approved the transaction.');
    }

    public function rejectTransaction(Request $request, Transaction $transaction)
    {
        // return($request);
         $transaction->rejectransfer($request->id);
    }

    public function reverseTransaction(Request $request, Transaction $transaction)
    {
        // return($request);
        $transaction->reverse($request->id);

    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //use modals
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //use update or create
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //use Soft Deletes
    }
}
