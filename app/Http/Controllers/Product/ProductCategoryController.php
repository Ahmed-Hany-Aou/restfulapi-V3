<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //
        $categories = $product->categories;
        return $this->showAll($categories);
    }

    

    public function update(Request $request, Product $product)
    {
        //
    }

   
    public function destroy(Product $product)
    {
        //
    }
}
