<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel{
    public function model(array $row){
        return new Category([
            'id' => $row[0], 
            'title' => $row[1],
            'slug' => strtolower(str_replace(' ','-',$row[1])), 
            'type' => $row[2],
            'image' => 'category.jpg',
            'parent_id' => $row[3],
            'is_featured' => 0
        ]);
    }
}
