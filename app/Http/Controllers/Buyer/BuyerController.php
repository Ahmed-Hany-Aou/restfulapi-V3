<?php

namespace App\Http\Controllers\Buyer;
use App\Buyer;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;

class BuyerController extends  ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers= Buyer::has('transactions')->get();
        //return response()->json(['data'=> $buyers],200);
        return $this->showAll($buyers);
    }

    
    public function show(Buyer $buyer)
    {
        //$buyer = Buyer::has('transactions')->findOrFail($id);
      //  return response()->json(['data'=> $buyer],200);
      return $this->showOne($buyer);
    }

 
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}