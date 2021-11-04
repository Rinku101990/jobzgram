<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Razorpay\Api\Api;
use App\Models\TransactionHistory;
use App\Models\WebinarAttend;
use App\Models\CourseAttend;
use Session;
use Exception;

class RazorpayPaymentController extends Controller
{
    
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        $transactionOrderId = Session::get('razorpayOrderId');

        $updateHistory = TransactionHistory::find($transactionOrderId);
        $updateHistory->txt_id = $response->id;
        $updateHistory->entity = $response->entity;
        $updateHistory->transaction = $response->amount/100;
        $updateHistory->currency = $response->currency;
        if($response->status=='captured'){
            $updateHistory->payment_status = 'Paid';
        }else{
            $updateHistory->payment_status = 'Unpaid';
        }
        $updateHistory->save();
        if($updateHistory->save()){
            // Mail Sending Module Block
            // $email_data = array(
            //     'name' => $userProfileName->prefixName.''.$userProfileName->name,
            //     'email' => $userProfileName->email,
            //     'bstatus'=>$request->status
            // );
            // Mail::send('email.payment_verification', $email_data, function ($message) use ($email_data) {
            //     $message->to($email_data['email'], $email_data['name'])
            //         ->subject('Welcome to Kidsfable')
            //         ->from('info@kidsfable.com', 'Kidsfable.com');
            // });
            // End of Mail Sending Module Block
            Session::put('success', 'Payment successful');
            return redirect('thankyou');
        }

    }

    public function save(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        $transactionOrderId = Session::get('razorpayOrderId');
        $updateWebinarAttend = WebinarAttend::find($transactionOrderId);
        $updateWebinarAttend->txt_id = $response->id;
        $updateWebinarAttend->payment = $response->amount/100;
        $updateWebinarAttend->currency = $response->currency;
        if($response->status=='captured'){
            $updateWebinarAttend->txt_status = 'Paid';
        }else{
            $updateWebinarAttend->txt_status = 'Unpaid';
        }
        $updateWebinarAttend->save();

        Session::put('success', 'Payment successful');
        return redirect('thankyou');
    }

    public function saveCourse(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        $transactionOrderId = Session::get('razorpayOrderId');
        $updateWebinarAttend = CourseAttend::find($transactionOrderId);
        $updateWebinarAttend->txt_id = $response->id;
        $updateWebinarAttend->payment = $response->amount/100;
        $updateWebinarAttend->currency = $response->currency;
        if($response->status=='captured'){
            $updateWebinarAttend->txt_status = 'Paid';
        }else{
            $updateWebinarAttend->txt_status = 'Unpaid';
        }
        $updateWebinarAttend->save();

        Session::put('success', 'Payment successful');
        return redirect('thankyou');
    }

    public function program_success()
    {
        return view('booking-thank');
    }

    public function success()
    {
        return view('booking-thank');
    }
}
