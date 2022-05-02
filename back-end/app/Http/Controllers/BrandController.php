<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return $brands;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $rules = [
            'name' => 'required',
        ];
        
        if($request->validate($rules)){
            try{
                $brand = Brand::createBrand($request->name);
                if($brand) {
                    return response()->json([
                        'message'=>'Brand created successfully!!'
                    ]);
                }
            }catch(\Exception $e){
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while creating a brand!!'
                ],500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return response()->json([
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required',
        ];

        if($request->validate($rules)){
            try{
                $brand->updateBrand($request->id, $request->name);    
                return response()->json([
                    'message'=>'Brand updated successfully!!'
                ]);
    
            }catch(\Exception $e){
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while updating a brand!!'
                ],500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            return response()->json([
                'message'=>'Brand deleted successfully!!'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a Brand!!'
            ]);
        }
    }
}
