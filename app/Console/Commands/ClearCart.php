<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Cart;
use Carbon\Carbon;
class ClearCart extends Command{
    protected $signature = 'clear-carts';
    protected $description = 'Clear users cart , this command runs once every 30 mins by Task scheduling';
    public function __construct(){
       parent::__construct();
    }
    public function handle(Cart $cart, Carbon $carbon){
       $OldCarts = Cart::where('status' , 'active')->whereDay('created_at' , Carbon::today())->get();
       $Last30Mins = Carbon::now()->subMinutes(30)->toDateTimeString();
       $OldCarts->map(function($i) use($Last30Mins){
            if(Carbon::parse($i->created_at)->diffInMinutes($Last30Mins,false) > 0){ //This item has been in cart for over 30 mins
                $i->update([
                    'status' => 'expired'
                ]);
                $i->Product->update([
                    'status' => 'Available'
                ]);
            }
       });
    }
}
