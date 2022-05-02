<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\HouseholdAppliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HouseholdApplianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $householdAppliances = HouseholdAppliance::all();

        return $householdAppliances;
    }

    public function create() {
        $brands = Brand::all();
        return response()->json([
            'brands' => $brands,
        ]);
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
            'description' => 'required',
            'voltage' => 'required',
            'brand_id' => 'required',
        ];

        if($request->validate($rules)){
            try{
                $householdAppliance = HouseholdAppliance::createHouseholdAppliance(
                    $request->name,
                    $request->description,
                    $request->voltage,
                    $request->brand_id,
                );
                if($householdAppliance) {
                    return response()->json([
                        'message'=>'Household Appliance created successfully!!'
                    ]);
                }
            }catch(\Exception $e){
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while creating a household appliance!!'
                ],500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseholdAppliance  $householdAppliance
     * @return \Illuminate\Http\Response
     */
    public function show(HouseholdAppliance $householdAppliance)
    {
        return response()->json([
            'householdAppliance' => $householdAppliance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseholdAppliance  $householdAppliance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseholdAppliance $householdAppliance)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'voltage' => 'required',
            'brand_id' => 'required',
        ];

        if($request->validate($rules)){
            try{
                $householdAppliance->updateHouseholdAppliance(
                    $request->id,
                    $request->name,
                    $request->description,
                    $request->voltage,
                    $request->brand_id,
                );    
                return response()->json([
                    'message'=>'Household Appliance updated successfully!!'
                ]);
    
            }catch(\Exception $e){
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while updating a household appliance!!'
                ],500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseholdAppliance  $householdAppliance
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseholdAppliance $householdAppliance)
    {
        try {
            $householdAppliance->delete();
            return response()->json([
                'message'=>'Household Appliance deleted successfully!!'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a Household Appliance!!'
            ]);
        }
    }
}
