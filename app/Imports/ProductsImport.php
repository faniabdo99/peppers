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
            $Status = ($row[1] > 0) ? 'Available' : 'Sold Out';
            $InStock = ($row[1] > 0) ? 1 : 0;
            $Brand = $row[2];
            //Create the product
            $TheProduct = Product::create([
                'title' => $row[3],
                'slug' => strtolower(preg_replace('/[^A-Za-z0-9]+/' , '-' , $row[3])),
                'status' => $Status,
                'image' => $row[0].'.png',
                'sku' => strtoupper($row[0]),
                'color' => $row[6],
                'condition' => $row[4],
                'description' => $row[3],
                'buy_price' => 500,
                'price' => $row[11],
                'content' => $row[12],
                'size' => $row[7],
                'height' => $row[8],
                'width' => $row[9],
                'depth' => $row[10],
                'qty' => $row[1],
                'in_stock' => $InStock,
                'for_gender' => 'Women',
                'store_location' => 'Cairo',
                'brand_id' => $Brand,
                'category_id' => $row[5],
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
