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
            $Status = ($row[13] > 0) ? 'Available' : 'Sold Out';
            $InStock = ($row[13] > 0) ? 1 : 0;
            $Brand = $row[6];
            //Create the product
            $TheProduct = Product::create([
                'title' => $row[10],
                'slug' => strtolower(preg_replace('/[^A-Za-z0-9]+/' , '-' , $row[10])),
                'status' => $Status,
                'image' => $row[0].'.png',
                'sku' => strtoupper($row[0]),
                'color' => $row[3],
                'condition' => $row[5],
                'description' => $row[2],
                'buy_price' => 500,
                'price' => $row[12],
                'content' => $row[2],
                'size' => $row[4],
                'height' => $row[7],
                'width' => $row[8],
                'depth' => $row[9],
                'qty' => $row[13],
                'in_stock' => $InStock,
                'for_gender' => 'Women',
                'store_location' => 'Cairo',
                'brand_id' => $Brand,
                'category_id' => $row[11],
                'user_id' => 1,
                'is_featured' => 0,
                'is_new' => 0,
            ]);
            //Create the product gallery
            $DummyArray = [
                1 => 'a',
                2 => 'a',
                3 => 'a'
            ];
            foreach($DummyArray as $key => $Item){
                ProductImage::create([
                    'image' => $row[0].'-'.($key+1).'.png',
                    'product_id' => $TheProduct->id
                ]);
            }
        }
    }
}
