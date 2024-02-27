<?php
namespace App\Imports;

use App\Models\ItemProcess;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemProcessImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ItemProcess([
            'code' => isset($row['code']) ? $row['code'] : null,
            'name' => isset($row['name']) ? $row['name'] : null,
            'uom' => isset($row['uom']) ? $row['uom'] : null,
            'asset_type' => isset($row['asset_type']) ? $row['asset_type'] : null,
            'itemCat1Code' => isset($row['itemcat1code']) ? $row['itemcat1code'] : null,
            'itemCat2Code' => isset($row['itemcat2code']) ? $row['itemcat2code'] : null,
            'itemCat3Code' => isset($row['itemcat3code']) ? $row['itemcat3code'] : null,
            'itemCat4Code' => isset($row['itemcat4code']) ? $row['itemcat4code'] : null,
            'itemCat5Code' => isset($row['itemcat5code']) ? $row['itemcat5code'] : null,
            'itemCat6Code' => isset($row['itemcat6code']) ? $row['itemcat6code'] : null,
            'itemCat7Code' => isset($row['itemcat7code']) ? $row['itemcat7code'] : null,
            'brand_code' => $row['brand_code'],
            'ean' => $row['ean'],
            'access_level' => $row['access_level'],
            'is_active' => ($row['is_active'] === 'true'), // Convert to boolean
        ]);
    }
}

