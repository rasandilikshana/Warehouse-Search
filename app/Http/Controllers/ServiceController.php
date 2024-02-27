<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Exports\ServiceExport;
use App\Imports\ServiceImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $selectedUom = $request->input('uom');
        $selectedAssetType = $request->input('asset_type');

        $service = Service::orderBy('created_at', 'DESC')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('code', 'like', '%' . $search . '%');
            })
            ->when($selectedUom, function ($query, $selectedUom) {
                return $query->where('uom', $selectedUom);
            })
            ->when($selectedAssetType, function ($query, $selectedAssetType) {
                return $query->where('asset_type', $selectedAssetType);
            })
            ->paginate(100);

        $uomOptions = Service::distinct('uom')->pluck('uom');
        $assetTypeOptions = Service::distinct('asset_type')->pluck('asset_type');
        $selectedUom = $selectedUom ?: $uomOptions->first();
        $selectedAssetType = $selectedAssetType ?: $assetTypeOptions->first();

        return view('services.index', compact('service', 'uomOptions', 'assetTypeOptions'));
    }

    public function uploadExcel(Request $request)
{
    $this->validate($request, [
        'excel_file' => 'required|mimes:xlsx,xls'
    ]);

    $file = $request->file('excel_file');

    // Truncate the table to remove existing data
    Service::truncate();

    try {
        // Process the uploaded Excel file using Laravel Excel
        Excel::import(new ServiceImport, $file);

        return redirect()->route('services')->with('success', 'Excel file uploaded and processed successfully');
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error uploading Excel file for services: ' . $e->getMessage());

        // Flash a custom error message
        return redirect()->route('services')->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        Service::create($request->all());

        return redirect()->route('services')->with('success', 'Service added successfully');
    }

    public function show(string $id)
    {
        $service = Service::findOrFail($id);

        return view('services.show', compact('service'));
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $service->update($request->all());

        $queryParams = http_build_query([
            'search' => $request->input('search'),
            'uom' => $request->input('uom'),
            'asset_type' => $request->input('asset_type'),
        ]);

        return redirect()->route('services',$queryParams)->with('success', 'product updated successfully');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()->route('services')->with('success', 'product deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ServiceExport, 'Service Items.xlsx');
    }
}
