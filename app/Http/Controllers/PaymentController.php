<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Order;
use App\Package;
use DB;
use Auth;

class PaymentController extends Controller
{
    public function paid(Request $request){
    	$post_data = array();

          //vlidation amount
        $package_id = $request->input('pack_id');
        $package = Package::find($package_id);
        $pack_amount = $package->amount;
        $paid_amount = $request->input('amount');
        //$valid_amount = $pack_amount * 20 / 100;
        $due_amount = $pack_amount - $paid_amount;



        $post_data['total_amount'] = $paid_amount; # You cant not pay less than 10
        $post_data['due_amount'] = $due_amount;
        $post_data['pack_id'] = $package_id;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique




        

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->input('customer_name');
        $post_data['cus_email'] = $request->input('customer_email');
        $post_data['cus_add1'] = $request->input('address');
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->input('customer_mobile');
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'due' => $post_data['due_amount'],
                'pack_id' => $post_data['pack_id'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

            $package->confirmed = 1;
            $package->save();

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }








    public function payment(Request $request){
        $post_data = array();

           //vlidation amount
        $package_id = $request->input('pack_id');
        $package = Package::find($package_id);
        $pack_amount = $package->amount;

        $paid_amount = $request->input('amount');

        $valid_amount = $pack_amount * 20 / 100;
        
        if($paid_amount > $valid_amount){
            $due_amount = $pack_amount - $paid_amount;
        }else{
            return redirect()->route('user.payment_create', $package_id)->with('error', 'Paid minimum 20%');
        }
        
        $post_data['total_amount'] = $paid_amount;# You cant not pay less than 10
        $post_data['due_amount'] = $due_amount;
        $post_data['pack_id'] = $package_id;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        $user_email = Auth::user()->email;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->input('customer_name');
        $post_data['cus_email'] = $user_email;
        $post_data['cus_add1'] = $request->input('address');
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->input('customer_mobile');
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'due' => $post_data['due_amount'],
                'pack_id' => $post_data['pack_id'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);
            $package->confirmed = 1;
            $package->save();

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }


    //with eloquent
    public function paid2(Request $request){
        $this->validate($request, [
            'pack_id' => 'required',
            'amount' => 'required',
            'customer_mobile' => 'required'
        ]);

        $post_data = array();

          //vlidation amount
        $package_id = $request->input('pack_id');

        $package = Package::find($package_id);
        $pack_amount = $package->amount;
        $paid_amount = $request->input('amount');
        //$valid_amount = $pack_amount * 20 / 100;
        $due_amount = $pack_amount - $paid_amount;


        
                $order = new Order;

                $order->name = $request->input('customer_name');
                $order->email = $request->input('customer_email');
                $order->address = $request->input('address');
                $order->phone = $request->input('customer_mobile');
                $order->transaction_id = uniqid();
                $order->status = 'Pending';
                $order->currency = 'BDT';
                $order->amount = $paid_amount;
                $order->due = $due_amount;
                $order->pack_id = $package_id;
                $order->save();

                $package->confirmed = 1;
                $package->save();

        



        $post_data['total_amount'] = $paid_amount; # You cant not pay less than 10
        $post_data['due_amount'] = $due_amount;
        $post_data['pack_id'] = $package_id;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique        

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->input('customer_name');
        $post_data['cus_email'] = $request->input('customer_email');
        $post_data['cus_add1'] = $request->input('address');
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->input('customer_mobile');
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
}
