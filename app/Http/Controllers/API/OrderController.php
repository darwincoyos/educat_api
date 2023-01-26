<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $fields = $request->validate([
            'name' => 'required|string',
            'stocks' => 'required|integer'
        ]);

        //check if may stocks pa
        $product = Product::where('name','=',$fields['name'])
                            ->where('stocks','>',0)
                            ->first();

        if($product){
            $updateProduct = Product::find($product['id']);

            if($updateProduct->stocks < $fields['stocks']){
                return response(['message'=>'Failed to order this product due to unavalability of the stock']);
            }
            $updateProduct->stocks = $updateProduct->stocks - $fields['stocks'];
            if($updateProduct->update()){
                return response(['message'=>'You have successfully ordered this product'],201);
            }
        }
        else{
            return response(['message'=>'Failed to order this product due to unavalability of the stock']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
