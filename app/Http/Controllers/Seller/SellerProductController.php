<?php

namespace App\Http\Controllers\Seller;

use App\User;
use App\Seller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use App\Transformers\ProductTransformer;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $products = $seller ->products;
        return $this->showAll($products);
    }

    public function store(Request $request, User $seller) /// we used User because when we add first product to some one he is not  yes a seller (still dindt came a seller)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1',
           // 'image' => 'required|image', // failed to upload image via post man so i comment this line 
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['status'] = Product::UNAVAILABLE_PRODUCT;
        $data['image'] = '1.jpg';
        $data['seller_id'] = $seller->id;

        $product = Product::create($data);

        return $this->showOne($product);
    }
}
