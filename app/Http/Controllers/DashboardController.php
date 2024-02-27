<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\ItemProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $serviceCount = Service::count();
        $itemprocessCount = ItemProcess::count();
        $userCount = User::count();

        //Material
        $consumable = Product::where('asset_type','Consumable')->get();
        $recurringfixed = Product::where('asset_type','Recurring Fixed Asset')->get();
        $fixed = Product::where('asset_type','Fixed Asset')->get();
        $consumable_count = count($consumable);
        $recurringfixed_count = count($recurringfixed);
    	$fixed_count = count($fixed);

        //Service
        $serviceitem = Service::where('asset_type','Service Item')->get();
        $glassignitem = Service::where('asset_type','Service type direct GL assign item')->get();
        $serviceitem_count = count($serviceitem);
        $glassignitem_count = count($glassignitem);

        //Item Process
        $categoryCounts = ItemProcess::select('itemCat4Code', ItemProcess::raw('COUNT(*) as count'))
            ->groupBy('itemCat4Code')
            ->pluck('count', 'itemCat4Code');

        return view('dashboard', compact('productCount', 'serviceCount', 'itemprocessCount','userCount','consumable_count','recurringfixed_count','fixed_count','serviceitem_count','glassignitem_count','categoryCounts'));
    }
}
