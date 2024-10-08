<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
       return $this->showAll($categories);
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|unique:categories',// i made it uinque
            'description'=>'required',
            ];
            $this->validate($request,$rules);
            $newcategory=Category::create($request->all());
            return $this->showOne($newcategory,201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this ->showOne($category);

    }

    
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category ->fill($request->intersect([
            'name',
            'description'
        ]));
        if ($category -> isClean()){
            return response()->json(['error'=>'You need to specify a different value to update'],422);
            }
            $category->save();
            return $this->showOne($category);
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category -> delete();
        return $this ->showOne($category);
    }
}
