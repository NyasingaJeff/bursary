<?php

namespace App\Http\Controllers;

use App\Mpesa\STKPush;
use App\Models\MpesaSTK;
use Iankumu\Mpesa\Facades\Mpesa;//import the Facade
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaSTKPUSHController extends Controller
{
    public $result_code = 1;
    public $result_desc = 'An error occured';

    // Initiate  Stk Push Request
    public function STKPush($idNumber,$phoneNumber)
    {

        $amount = 1;
        $phoneno = $phoneNumber;
        $account_number = $idNumber;
        $callbackurl = env('MPESA_CALLBACK_URL');


        $response = Mpesa::stkpush($phoneno, $amount, $account_number,$callbackurl);
        $result = json_decode((string)$response, true);
        Log::info($result);


        // MpesaSTK::create([
        //     'merchant_request_id' =>  $result['MerchantRequestID'],
        //     'checkout_request_id' =>  $result['CheckoutRequestID']
        // ]);

        return $result;
    }
    public function STKConfirm(Request $request)
    {

        Log::info($request->all());

        $stk_push_confirm = (new STKPush())->confirm($request);

        if ($stk_push_confirm) {

            $this->result_code = 0;
            $this->result_desc = 'Success';
        }
        return response()->json([
            'ResultCode' => $this->result_code,
            'ResultDesc' => $this->result_desc
        ]);
    }

    function confirmation($checkoutRequestId)  {
        $response=Mpesa::stkquery($checkoutRequestId);
        $result = json_decode((string)$response);
        return $result;
    }
}
