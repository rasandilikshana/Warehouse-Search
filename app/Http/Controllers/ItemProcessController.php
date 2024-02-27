<?php

namespace App\Http\Controllers;

use App\Models\ItemProcess;
use Illuminate\Http\Request;
use App\Imports\ItemProcessImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Exports\ItemProcessExport;

class ItemProcessController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $selectedUom = $request->input('uom');
        $selectedAssetType = $request->input('asset_type');

        $itemprocess = ItemProcess::orderBy('created_at', 'DESC')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                ->orwhere('code', 'like', '%' . $search . '%');
            })->when($selectedUom, function ($query, $selectedUom) {
                return $query->where('uom', $selectedUom);
            })
            ->when($selectedAssetType, function ($query, $selectedAssetType) {
                return $query->where('asset_type', $selectedAssetType);
            })
            ->paginate(100);

        $uomOptions = ItemProcess::distinct('uom')->pluck('uom');
        $assetTypeOptions = ItemProcess::distinct('asset_type')->pluck('asset_type');
        $selectedUom = $selectedUom ?: $uomOptions->first();
        $selectedAssetType = $selectedAssetType ?: $assetTypeOptions->first();

        return view('itemprocesss.index', compact('itemprocess','uomOptions', 'assetTypeOptions'));
    }

    public function uploadExcel(Request $request)
    {
        try {
            $this->validate($request, [
                'excel_file' => 'required|mimes:xlsx,xls,csv'
            ]);

            $file = $request->file('excel_file');

            // Truncate the table to remove existing data
            ItemProcess::truncate();

            // Process the uploaded Excel file using Laravel Excel
            Excel::import(new ItemProcessImport, $file);

            return redirect()->route('itemprocesss')->with('success', 'Excel file uploaded and processed successfully');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error uploading Excel file: ' . $e->getMessage());

            // You can also flash an error message to the user
            return redirect()->route('itemprocesss')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itemprocesss.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ItemProcess::create($request->all());

        return redirect()->route('itemprocesss')->with('success', 'ItemProcess added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $itemprocess = ItemProcess::findOrFail($id);

        return view('itemprocesss.show', compact('itemprocess'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $itemprocess = ItemProcess::findOrFail($id);

        return view('itemprocesss.edit', compact('itemprocess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $itemprocess = ItemProcess::findOrFail($id);

        $itemprocess->update($request->all());

        $queryParams = http_build_query([
            'search' => $request->input('search'),
            'uom' => $request->input('uom'),
            'asset_type' => $request->input('asset_type'),
        ]);

        return redirect()->route('itemprocesss',$queryParams)->with('success', 'ItemProcess updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemprocess = ItemProcess::findOrFail($id);

        $itemprocess->delete();

        return redirect()->route('itemprocesss')->with('success', 'ItemProcess deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ItemProcessExport, 'Item Process.xlsx');
    }
}
