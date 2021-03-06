<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $guarded = [];
    use HasFactory;
    public function getSmallThumbAttribute(){
        return url('storage/app/products/small_thumb/'.$this->image);
    }
    public function getThumbAttribute(){
        return url('storage/app/products/thumb/'.$this->image);
    }
    public function getFullSizeAttribute(){
        return url('storage/app/products/full_size/'.$this->image);
    }
    public function Gallery(){
        return $this->hasMany(ProductImage::class , 'product_id');
    }
    public function Brand(){
        return $this->belongsTo(Brand::class , 'brand_id');
    }
    // public function Discount(){
    //     return $this->belongsTo(Discount::class , 'product_id');
    // }
    public function Category(){
        return $this->belongsTo(Category::class , 'category_id')->withDefault([
            'title' => 'Not Avilable'
        ]);
    }
    public function getCartReadyAttribute(){
        if($this->qty > 0 && $this->status == 'Available'){
            return true;
        }else{
            return false;
        }
    }
}
