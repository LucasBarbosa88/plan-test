<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function createBrand($name) { 
        $brand = new Brand;

        $brand->name = $name;

        if($brand->save()) {
            return $brand;
        }

        return false;
    }

    public static function updateBrand($id, $name) { 
        $brand = Brand::find($id);

        $brand->name = $name;

        if($brand->save()) {
            return $brand;
        }

        return false;
    }
}
