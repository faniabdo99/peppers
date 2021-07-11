<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Http;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Cart;
use Mail;
use App\Mail\OrderPlaceMail;
use App\Mail\OrderReceipt;
class OrderController extends Controller{
    public function getCheckout(){
        if(userCartCount(getUserId()) > 0){
            return view('orders.checkout');
        }else{
            return redirect()->route('home')->withErrors("You don't have anything in your cart!");
        }
    }
    public function postCheckout(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'payment_method' => 'required'
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all())->withInput();
        }else{
            //Validate the payment method
            //Check the payment method value
            $ViablePaymentMethods = ['cod','credit-card'];
            if(in_array($r->payment_method, $ViablePaymentMethods)){
                $CartItems = Cart::where('user_id', getUserId())->where('status', 'active')->get();
                $CartArray = $CartItems->map(function ($item) {
                    return $item->Product->price;
                })->toArray();
                $CartTotal = array_sum($CartArray);
                //Create the order
                $OrderData = $r->except(['_token']);
                $OrderData['status'] = 'Awaits Payment';
                $OrderData['is_paid'] = 0;
                if($r->country == 'Egypt'){
                    $OrderData['total_shipping_cost'] = 5;
                }else{
                    $OrderData['total_shipping_cost'] = 80;
                }
                $OrderData['user_id'] = getUserId();
                $OrderData['tracking_number'] = mt_rand(10000000, 99999999);
                $OrderData['total_amount'] = $CartTotal;
                $TheOrder = Order::create($OrderData);
                //Create order-products record
                $CartItems = Cart::where('user_id', getUserId())->where('status', 'active')->get();
                $CartItems->map(function($item) use ($TheOrder){
                    OrderProduct::create([
                    'order_id' => $TheOrder->id,
                    'user_id' => $TheOrder->user_id,
                    'product_id' => $item->product_id,
                    'is_free_shipping' => 0
                    ]);
                    $item->update(['status' => 'complete']);
                });
                //Redirect to payment gatway
                if($TheOrder->payment_method == 'credit-card'){
                    //Create Order Items Variable
                    $OrderItems = [];
                    foreach($TheOrder->Items() as $Item){
                        array_push($OrderItems ,[
                            'name' => $Item->Variation->ref_code,
                            'amount_cents' => $Item->Product->price * 100,
                            'description' => $Item->Product->title,
                            'quantity' => $Item->qty
                        ]);
                    }
                    $response = Http::post('https://accept.paymobsolutions.com/api/auth/tokens',[
                        'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SnVZVzFsSWpvaWFXNXBkR2xoYkNJc0ltTnNZWE56SWpvaVRXVnlZMmhoYm5RaUxDSndjbTltYVd4bFgzQnJJam8yTURjeU4zMC5WYXUwVXNKS1UwNHV5cXF0VTFtN1lUdUtUQ2NfNkxqQk9RNlVJOTdjQU15OFk4d0JJU0ZMVlE4QnlraU9nbURzMWJfVUxZNkpuam9XMVdsXzlaa2xjdw==',
                    ]);
                    $ParseJson = json_decode($response->body());
                    $Token = $ParseJson->token;
                    //Send Order Request
                    $OrderRequest = Http::post('https://accept.paymobsolutions.com/api/ecommerce/orders' , [
                        'auth_token' => $Token,
                        'delivery_needed' => true,
                        'amount_cents' => convertCurrency(($TheOrder->FinalTotal) , 'USD' , 'EGP') * 100,
                        'currency' => 'EGP',
                        'merchant_order_id'=> $TheOrder->id,
                        // 'merchant_order_id'=> rand(1,500),
                        'items' => $OrderItems,
                        'shipping_data' => [
                            'email' => $TheOrder->email, 
                            'first_name' => $TheOrder->name, 
                            'street' => $TheOrder->address, 
                            'phone_number' => $TheOrder->phone_number, 
                            'postal_code' => 12511, 
                            'city' => $TheOrder->city, 
                            'country' => $TheOrder->country, 
                            'state' => 'State',
                            'notes' => $TheOrder->order_notes,
                            'last_name' => ' Nicolas'
                        ]
                    ]);
                    $PaymobOrderIdRequest = json_decode($OrderRequest);
                    $PaymobOrderID = $PaymobOrderIdRequest->id;
                    //Order Created
                    $PaymentRequest = Http::post('https://accept.paymobsolutions.com/api/acceptance/payment_keys' , [
                        'auth_token' => $Token,
                        'delivery_needed' => true,
                        'order_id' => $PaymobOrderID,
                        'expiration' => 3600, 
                        'amount_cents' => convertCurrency(($TheOrder->FinalTotal) , 'USD' , 'EGP') * 100,
                        'currency' => 'EGP',
                        'integration_id'=> 237719,
                        'billing_data' => [
                            'apartment' => 803, 
                            'floor' => 42, 
                            'building' => 8028, 
                            'last_name' => ' Nicolas',   
                            'email' => $TheOrder->email, 
                            'first_name' => $TheOrder->name, 
                            'street' => $TheOrder->address, 
                            'phone_number' => $TheOrder->phone_number, 
                            'postal_code' => 12511,
                            'city' => $TheOrder->city, 
                            'country' => 'EG', 
                            'state' => 'State',
                        ]
                    ]);
                    $PaymentToken = json_decode($PaymentRequest->body());
                    $FrameID = 154258;
                    $PaymentID = $PaymentToken->token;
                    return view('orders.pay' , compact('FrameID','PaymentID'));
                }
                //Send Order Mail to Admin
                try{
                    Mail::to('info@peppersluxury.com')->send(new OrderPlaceMail());
                    Mail::to($TheOrder->email)->send(new OrderReceipt($TheOrder));
                }catch(Exception $e){}
                return redirect()->route('order.complete' , $TheOrder->id);
            }else{
                return back()->withErrors('Payment method not available')->withInput();
            }
        }
    }
    public function getOrderComplete($id){
        $TheOrder = Order::findOrFail($id);
        return view('orders.complete', compact('TheOrder'));
    }
    public function getOrderSuccess(Request $r){
        $TheOrder = Order::findOrFail($r->merchant_order_id);
        if($r->success == 'true'){
            //Update the Order
            $TheOrder->update([
                'status' => 'Paid',
                'payment_id' => $r->id,
                'is_paid' => 1
            ]);
        }
        return view('orders.complete', compact('TheOrder'));
    }

    public function getAdmin(){
        $AllOrders = Order::latest()->get();
    // return view('admin.')
    }
    public function getSingle(){

    }
}