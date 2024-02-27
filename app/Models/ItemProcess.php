<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProcess extends Model
{
    use HasFactory;
    protected $table = 'itemprocess';
    protected $fillable = [
        'code',
        'name',
        'uom',
        'asset_type',
        'itemCat1Code',
        'itemCat2Code',
        'itemCat3Code',
        'itemCat4Code',
        'itemCat5Code',
        'itemCat6Code',
        'itemCat7Code',
        'brand_code',
        'ean',
        'access_level',
        'is_active'
    ];
}
