<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'code',
        'name',
        'uom',
        'asset_type',
        'itemCat1Code',
        'itemCat2Code',
        'itemCat3Code',
        'itemCat7Code',
        'brand_code',
        'ean',
        'access_level',
        'is_active'
    ];
}
