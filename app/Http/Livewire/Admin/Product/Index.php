<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $product_id;
    public $product_image_id;

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.product.index', ['products' => $products]);
    }

    public function deleteProduct($product_id)
    {
        $this->product_id = $product_id;
    }

    public function destroyProduct()
    {
        $product = Product::find($this->product_id);
        $path = 'uploads/category/' . $product->images;
        if (File::exists($path)) {
            File::delete($path);
        }
        $product->delete();
        Session::flash('message', 'Product Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }


}
