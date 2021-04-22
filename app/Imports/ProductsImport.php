<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection{
    public function collection(Collection $rows){
        foreach($rows as $TheKey => $row){
            $Status = ($row[12] > 0) ? 'Available' : 'Sold Out';
            $InStock = ($row[12] > 0) ? 1 : 0;
            $Brand = Brand::where('title' , $row[2])->first();
            if($Brand){
                $Brand = $Brand->id;
            }else{
                $Brand = 1;
            }
            //Create the product
            $TheProduct = Product::create([
                'title' => $row[5],
                'slug' => strtolower(str_replace(' ' , '-' , $row[5])),
                'status' => $Status,
                'image' => $row[0].'.png',
                'sku' => strtoupper($row[0]),
                'color' => $row[3],
                'condition' => $row[4],
                'description' => $row[7],
                'buy_price' => 500,
                'price' => $row[6],
                'content' => $row[7],
                'size' => $row[8],
                'height' => $row[9],
                'width' => $row[10],
                'depth' => $row[11],
                'qty' => $row[12],
                'in_stock' => $InStock,
                'for_gender' => 'Men',
                'store_location' => 'Cairo',
                'brand_id' => $Brand,
                'category_id' => 1,
                'user_id' => 1,
                'is_featured' => 0,
                'is_new' => 0,
            ]);
            //Create the product gallery
            $DummyArray = [
                1 => 'a',
                2 => 'a',
                3 => 'a',
                4 => 'a',
                5 => 'a'
            ];
            foreach($DummyArray as $key => $Item){
                ProductImage::create([
                    'image' => $row[0].'-'.$key.'.png',
                    'product_id' => $TheProduct->id
                ]);
            }
        }
    }
}
