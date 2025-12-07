<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Product;


class ProductsController extends Controller
{
    public function index()
    {
        $features = Feature::with('cards')->orderBy('order_index')->get();

        $products = Product::with('features')->get();

        return view("frontend.pages.products", compact("features", 'products'));
    }
}
