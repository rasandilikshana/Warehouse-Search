<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class SearchData extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $totalCount = 0;

    public function mount()
    {
        if (session()->has('searchTerm')) {
            $this->searchTerm = session('searchTerm');
        }
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
        session(['searchTerm' => $this->searchTerm]);
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('code', 'like', '%' . $this->searchTerm . '%')
            ->paginate(300);

        $this->totalCount = $products->total();

        return view('livewire.search-data', [
            'products' => $products,
        ]);
    }
}
