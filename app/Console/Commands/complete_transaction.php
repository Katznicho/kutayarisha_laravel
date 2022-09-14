<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PaymentModel;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class complete_transaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:complete_transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    
    public function handle()
    {  
        $username = "611b26c4-2c6c-407c-ae24-c86029434b04";
        $password = "0b7062a15fc9a8417d25be8bcfde11ac";
        //get all the pending payments
        $payments = PaymentModel::where('status', 'Pending')->get();
        //loop through the payments if any
        foreach($payments as $payment){
            //get the payment details
            $transaction_details = Http::withBasicAuth(
                trim($username),
                trim($password),

            )->post(

                'https://wallet.ssentezo.com/api/get_status/'.$payment->externalReference,
                
                []
            );
            if(isset($transaction_details['status'])){
                info($transaction_details);
                //if the transaction is successful
                if($transaction_details['status'] == 'SUCCEEDED' ){
                    //update the payment status to success
                    $payment->status = 'Completed';
                    $payment->save();
                    //update the user subscription status to active
                    $user = User::find($payment->user_id);
                    $user->subscriptionPlan = $payment->plan_id;   
                }
                if($transaction_details['status'] == 'PENDING' ){
                    //update the payment status to success
                    $payment->status = 'Completed';
                    $payment->save();
                    //update the user subscription status to active
                    $user = User::find($payment->user_id);
                    $user->subscriptionPlan = $payment->plan_id;   
                }
                if($transaction_details['status'] == 'FAILED'){
                    //update the payment status to success
                    $payment->status = 'Failed';
                    //update the narrative
                    $payment->narrative = "Transaction Failed";
                    $payment->save();
                    //update the user subscription status to active  
                }
                 
            }
            else{
                //if the transaction is not successful
                $payment->status = 'Failed';
                $payment->save();
            }

            
        }
        

    }
}
