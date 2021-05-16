<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller{
    public function getAll(){
        $Cart = Cart::where('user_id' , getUserId())->where('status' , 'active')->get();
        $CartSubTotalArray = $Cart->map(function($item) {
            return $item->Product->price;
        });
        $Total = $CartSubTotalArray->sum();
        return view('orders.cart',compact('Cart' , 'Total'));
    }
    public function addToCart(Request $r){
         /*
            Add an Item to Cart
            #1 Check if the requested data available in inventory
            #2 Check if the item already exist, if so add to the current value
        */
        //Validate the Request
        $Rules = [
            'user_id' => 'required',
            'product_id' => 'required|numeric'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return response('Something went wrong, Please refresh the page and try again' , 400);
        }else{
            //Check if the product is available in inventory
            $Inventory = Product::find($r->product_id);
            if($Inventory){
                if($Inventory->CartReady){
                    //Update Current Cart if There is
                    $CurrentCart = Cart::where('user_id' , $r->user_id)->where('status', 'active')->where('product_id' , $Inventory->id)->first();
                    if($CurrentCart){
                        return response('You already have this product in your cart',400);
                    }else{
                        //Create Cart Data
                        $CartData = $r->all();
                        $CartData['product_id'] = $Inventory->id;
                        //The Item is Available (Add to Cart)
                        Cart::create($CartData);
                    }
                    //Mark Product Sold Out
                    $Inventory->update([
                        'status' => 'Sold Out'
                    ]);
                    return response('Item added to your cart!' , 200);
                }else{
                    return response('This product is not avilable for sale right now' , 400);
                }
            }else{
                return response('This product is not avilable for sale right now' , 400);
            }
        }
    }
    public function delete($id){
        $TheCart = Cart::findOrFail($id);
        //Make the item available agian
        $TheCart->Product->update([
            'status' => 'Available'
        ]);
        //Remove the item from cart
        $TheCart->update([
            'status' => 'deleted'
        ]);
        return back()->withSuccess('Item deleted from your cart');
    }
}
