<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mojaloop extends Controller
{
    //index
    public function index()
    {
        return view('mojaloop.index');
    }
    //look up function
    public function show(Request $request)
    {
    

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://sandbox.mojaloop.io/switch-ttk-backend/thirdpartyTransaction/partyLookup',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{ 
            "transactionRequestId": "b51ec534-ee48-4575-b6a9-ead2955b8069",
            "payee": {
              "partyIdType": "MSISDN",
              "partyIdentifier":"0759983855"
            }
          }',
          CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        //convert json to array
        $data = json_decode($response, true);
    
        //pass the response to the view
        return view('mojaloop.show', compact('data'));
    
    }

}
