<?php

namespace App\Http\Controllers;

use App\Models\PaymentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class MakePaymentController extends Controller
{   
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //select all the payments made by the user based on the user id 
            $payments = PaymentModel::where('user_id', Auth::user()->id)->select('*');
            //dd($roles);
            return DataTables::of($payments)
            ->addColumn('action', function ($row) {

                $id = $row->id;
                //   ';
                return view('payments.actions', compact('id'))->render();
            })
            ->make(true);
        }

        return view('payments.index');
    }
    
    public function formatToLocalNumber($mobile)
    {
        $length = strlen($mobile);
        $m = '0';
        //format 1: +256752665888
        if ($length == 13)
            return $mobile;
        elseif ($length == 12) //format 2: 256752665888
            return   $mobile;
        elseif ($length == 10) //format 3: 0752665888
            return $m .= substr($mobile, 1);
        elseif ($length == 9) //format 4: 752665888
            return $m .= $mobile;

        return $mobile;
    }
    public function make_payment(Request $request)
    {
        
          //use try catch to handle errors
        $curl = curl_init();

         //genereate a unique transaction id based on the current time
        $transaction_id = time();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://wallet.ssentezo.com/api/deposit',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('amount' => '500', 
            'msisdn' => $this->formatToLocalNumber($request->phone), 
            'environment' => 'production', 'callback' => 'localhost', 
            'externalReference' =>$transaction_id ,
             'reason' => "payment for a subscription of type $request->package", 
            'currency' => 'UGX'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic NjExYjI2YzQtMmM2Yy00MDdjLWFlMjQtYzg2MDI5NDM0YjA0OjBiNzA2MmExNWZjOWE4NDE3ZDI1YmU4YmNmZGUxMWFj',
                'Cookie: PHPSESSID=amkga7fj3rclrijelckobn1igk'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        // store the response in a variable
        $response = json_decode($response, true);

        //$response['status']

        //record the transaction in the database
        //if()
        PaymentModel::create([
            'user_id' => Auth::user()->id,
            'plan_id' => $request->plan_id,
            'status' => "Pending",
            'externalReference' => $transaction_id,
            'narrative' => "payment for a subscription of type $request->package",
            'phone' => $request->phone,
            'currency' => "UGX",
            'amount' => $request->amount,
        ]);

        return Response::json("a notification has been sent to your phone number $request->phone");
        //check if a response returned is has message failure

        //{"message":"failure","status":"FAILED","errorCode":"DUPLICATE_REFERENCE"}
        //{"message":"failure","status":"FAILED","errorCode":"INVALID_AMOUNT"}
        //check if a response returned is has message success
        //create abn array


        
        
        //echo $response;
    }

    //mojaloop api payment
    public function mojaloop_payment(Request $request)
    {
        //use try catch to handle errors
        
        
    }
    
}
