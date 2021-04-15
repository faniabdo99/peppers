<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProductImage extends Model{
    protected $guarded = [];
    use HasFactory;
    public function getSmallThumbAttribute(){
        return url('storage/app/products_gallery/small_thumb/'.$this->image);
    }
    public function getThumbAttribute(){
        return url('storage/app/products_gallery/thumb/'.$this->image);
    }
    public function getFullSizeAttribute(){
        return url('storage/app/products_gallery/full_size/'.$this->image);
    }
}
