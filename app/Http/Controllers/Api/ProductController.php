<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $keyword = request()->query('keyword');

        $product = Product::query();

        if ($keyword) {
            $product->where('brand', 'like', '%' . $keyword . '%')->orWhere('model', 'like', '%' . $keyword . '%');
        }
        return response()->json($product->get());
    }
}
