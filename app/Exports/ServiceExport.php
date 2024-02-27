<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Service::query()->select(
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
