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
    public function formatToLocalNumber($mobile)
    {
        $length = strlen($mobile);
        $m = '256';
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
            
                //if the transaction is successful
                if($transaction_details['status'] == 'SUCCEEDED' ){
                    //update the payment status to success
                    $payment->status = 'Completed';
                    $payment->save();
                    //update the user subscription status to active
                    $user = User::find($payment->user_id);
                    $user->subscriptionPlan = $payment->plan_id;
                    $user->save();   
                    $message = "Your payment of ".$payment->amount." was successful with Kutayarisha. Your subscription is now active and you can now start using the platform click here to login http://kutayarisha.adfamedicareservices.com";
                    $phone = $this->formatToLocalNumber($user->phone); 
                  //send a message
                  //https://sms.thinkxsoftware.com/sms_api/api.php?link=sendmessage&user=musawoadfa&password=log10tan10&message=1234&reciever=256759983853
                  Http::get('https://sms.thinkxsoftware.com/sms_api/api.php?link=sendmessage&user=musawoadfa&password=log10tan10&message='.$message.'&reciever='.$phone);
                }
                if($transaction_details['status'] == 'PENDING' ){
                    //update the payment status to success
                    $payment->status = 'Completed';
                    $payment->save();
                    //update the user subscription status to active
                    $user = User::find($payment->user_id);
                    $user->subscriptionPlan = $payment->plan_id;
                    //save the updated user details
                    $user->save();
                    $message = "Your payment of ".$payment->amount." was successful with Kutayarisha. Your subscription is now active and you can now start using the platform click here to login http://kutayarisha.adfamedicareservices.com";
                        $phone = $this->formatToLocalNumber($user->phone); 
                      //send a message
                      //https://sms.thinkxsoftware.com/sms_api/api.php?link=sendmessage&user=musawoadfa&password=log10tan10&message=1234&reciever=256759983853
                      Http::get('https://sms.thinkxsoftware.com/sms_api/api.php?link=sendmessage&user=musawoadfa&password=log10tan10&message='.$message.'&reciever='.$phone);

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
