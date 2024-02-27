<?php

namespace App\Exports;

use App\Models\ItemProcess;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ItemProcessExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return ItemProcess::query()->select(
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
}
