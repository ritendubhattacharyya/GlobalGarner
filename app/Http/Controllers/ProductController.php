<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        return view('home', compact('products'));
    }

    public function create() 
    {
        return view('create-product');
    }

    public function store(ProductValidation $request) 
    {
        $attributes = $request->validated();
        $attributes['avatar'] = request('avatar')->store('avatars');
        $attributes['user_id'] = auth()->user()->id;
        Product::create($attributes);
        return redirect('home');
    }

    public function edit($id) 
    {
        $product = Product::find($id);
        return view('edit-product', compact('product'));
    }

    public function update(ProductValidation $request, $id) 
    {
        $product = Product::find($id);
        $attributes = $request->validated();
        if(!is_null(request('avatar'))) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        $product->update($attributes);
        return redirect('home');
    }

    public function delete($id) 
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('home');
    }
}
