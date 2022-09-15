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
        
        //convert json to array
        $data = json_decode($response, true);
    
        //pass the response to the view
        return view('mojaloop.show', compact('data'));
    
    }

    //create an initiate function
    public function create(Request $request)
    {


        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://sandbox.mojaloop.io/switch-ttk-backend/thirdpartyTransaction/b51ec534-ee48-4575-b6a9-ead2955b8069/initiate',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "payee":{
              "name":"Bob bobbington",
              "partyIdInfo":{
                "fspId":"dfspb",
                "partyIdType":"MSISDN",
                "partyIdentifier":"16135551212"
              }
            },
            "payer":{
              "partyIdType":"THIRD_PARTY_LINK",
              "partyIdentifier":"16135551212",
              "fspId":"dfspa"
            },
            "amountType":"RECEIVE",
            "amount":{
              "currency":"PHP",
              "amount":"123.47"
            },
            "transactionType":{
              "scenario":"TRANSFER",
              "initiator":"PAYER",
              "initiatorType":"CONSUMER"
            },
            "expiration":"2021-05-24T08:38:08.699-04:00"
          }',
          CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        //echo $response;
      
        $data = json_decode($response, true);
        //dd($data['authorization']['amount']['amount']);

        return view('mojaloop.start', compact('data'));
        
        
    
    }

}
