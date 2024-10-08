<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Seller;



class SellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers= Seller::has('products')->get();
        //return response()->json(['data'=> $sellers],200);
        return $this->showAll($sellers);
    }

    
    public function show(Seller $seller)
    {
      //  $sellers = Seller::has('products')->findOrFail($id); no need for this line now
      //  return response()->json(['data'=> $sellers],200);
      return $this->showOne($seller);
    }

}