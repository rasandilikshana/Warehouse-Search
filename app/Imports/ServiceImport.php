<?php
namespace App\Imports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServiceImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Service([
            'code' => $row['code'],
            'name' => $row['name'],
            'uom' => $row['uom'],
            'asset_type' => $row['asset_type'],
            'itemCat1Code' => isset($row['itemcat1code']) ? $row['itemcat1code'] : null,
            'itemCat2Code' => isset($row['itemcat2code']) ? $row['itemcat2code'] : null,
            'itemCat3Code' => isset($row['itemcat3code']) ? $row['itemcat3code'] : null,
            'itemCat7Code' => isset($row['itemcat7code']) ? $row['itemcat7code'] : null,
            'brand_code' => $row['brand_code'],
            'ean' => $row['ean'],
            'access_level' => $row['access_level'],
            'is_active' => ($row['is_active'] === 'true'), // Convert to boolean
        ]);
    }
}
