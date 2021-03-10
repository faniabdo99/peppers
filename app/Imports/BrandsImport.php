<?php
namespace App\Imports;
use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;

class BrandsImport implements ToModel{
    public function model(array $row){
        return new Brand([
            'id' => $row[0],
            'title' => $row[1],
            'slug' => strtolower(str_replace(' ' , '-' , $row[1])),
            'image' => 'brand.png',
            'is_featured' => 0
        ]);
    }
}
