<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $selectedUom = $request->input('uom');
        $selectedAssetType = $request->input('asset_type');

        $product = Product::orderBy('created_at', 'DESC')
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

        $uomOptions = Product::distinct('uom')->pluck('uom');
        $assetTypeOptions = Product::distinct('asset_type')->pluck('asset_type');
        $selectedUom = $selectedUom ?: $uomOptions->first();
        $selectedAssetType = $selectedAssetType ?: $assetTypeOptions->first();

        return view('products.index', compact('product','uomOptions', 'assetTypeOptions'));
    }

    public function uploadExcel(Request $request)
{
    $this->validate($request, [
        'excel_file' => 'required|mimes:xlsx,xls,csv'
    ]);

    $file = $request->file('excel_file');

    // Truncate the table to remove existing data
    Product::truncate();

    try {
        // Process the uploaded Excel file using Laravel Excel
        Excel::import(new ProductImport, $file);

        return redirect()->route('products')->with('success', 'Excel file uploaded and processed successfully');
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error uploading Excel file for products: ' . $e->getMessage());

        // Flash a custom error message
        return redirect()->route('products')->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        $queryParams = http_build_query([
            'search' => $request->input('search'),
            'uom' => $request->input('uom'),
            'asset_type' => $request->input('asset_type'),
        ]);

        return redirect()->route('products',$queryParams)->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'product deleted successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'Material Items.xlsx');
    }
}
