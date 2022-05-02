<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdAppliance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function createHouseholdAppliance($name, $description, $voltage, $brand_id) { 
        $householdAppliance = new HouseholdAppliance();

        $householdAppliance->name = $name;
        $householdAppliance->description = $description;
        $householdAppliance->voltage = $voltage;
        $householdAppliance->brand_id = $brand_id;

        if($householdAppliance->save()) {
            return $householdAppliance;
        }

        return false;
    }

    public static function updateHouseholdAppliance($id, $name, $description, $voltage, $brand_id) { 
        $householdAppliance = HouseholdAppliance::find($id);

        $householdAppliance->name = $name;
        $householdAppliance->description = $description;
        $householdAppliance->voltage = $voltage;
        $householdAppliance->brand_id = $brand_id;

        if($householdAppliance->save()) {
            return $householdAppliance;
        }

        return false;
    }
}
