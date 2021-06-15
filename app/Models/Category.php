<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $guarded = [];
    use HasFactory;
    public function Children(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function Products(){
        return $this->hasMany(Product::class,'category_id');
    }
}
