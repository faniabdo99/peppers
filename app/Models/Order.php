<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $guarded = [];
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class , 'user_id')->withDefault([
          'id' => 1,
          'name' => 'deleted user'
        ]);
      }
      public function Items(){
        return $this->hasMany(OrderProduct::class , 'order_id');
      }
      public function getTotalAttribute(){return $this->total_amount;}
      public function getTotalShippingAttribute(){return $this->total_shipping_cost;}
      public function getFinalTotalAttribute(){return $this->total + $this->total_shipping;}
      public function getPaymentMethodTextAttribute(){
        $PaymetMethods = [
          'cod' => 'Cash on Delivery',
          'credit-card' => 'Credit/Debit Card',
        ];
        if(array_key_exists($this->payment_method, $PaymetMethods)){
          return $PaymetMethods[$this->payment_method];
        }else{
          return $this->payment_method;
        }
    }
}
