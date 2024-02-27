<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Product::query()->select(
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
        );
    }

    public function headings(): array
    {
        return [
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
}
