<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;

class RepublicController extends Controller
{
    //
    // CRUD
    //
    public function createRepublic(Request $request)
    {
        $republic = new Republic;
                
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillRepublic($republic,$request);
                
        if(!isset($republic) || $republic->tenant == null)
            return response()->json('Tenant not found', 404);
        
        $republic->save();

        return response()->json($republic, 201);
    }

    public function showRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found.',404);
        
        return response()->json($republic, 200);
    }

    public function listRepublics()
    {
        $republic = Republic::all();
        return response()->json($republic, 200);
    }

    public function updateRepublic(Request $request, $id)
    {
        $republic = Republic::findOrFail($id);
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillRepublic($republic,$request);

        if(!isset($republic) || $republic->tenant == null)
            return response()->json('Tenant not found', 404);

        $republic->save();
        return response()->json($republic, 201);
    }

    public function deleteRepublic($id)
    {
        $republic = republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found',404);

        republic::destroy($id);
        return response()->json(['Republic ' . $id . ' deleted.'], 200);
    }

    //
    // Relationship methods
    //
    public function showRenters($id)
    {
        $republic = Republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found.',404);

        $renters = array();
        foreach($republic->bedrooms as $bedroom)
        {
            array_push($renters, $bedroom->renter);
        }

        return response()->json($renters, 200);
    }

    public function showTenant($id)
    {
        $republic = Republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found.',404);
        
        return response()->json($republic->tenant, 200);
    }

    public function showComments($id)
    {
        $republic = Republic::findOrFail($id);
        if($republic == null)
            return response()->json('Republic not found.',404);

        return response()->json($republic->comments, 200);
    }

    //
    // Methods
    //

    private function validateRequest(Request $request)
    {
        $republic = new Republic;
        $this->fillRepublic($republic, $request);

        if($republic->name == null || $republic->description == null || $republic->neighborhood == null || $republic->city == null 
            || $republic->state == null || $republic->address == null|| $republic->bathrooms == null || $republic->allowedTo == null 
            || $republic->value == null || $republic->tenant_id == null )
            return false;

        return true;
    }

    private function fillRepublic(Republic $republic, Request $request)
    {
        $republic->name = $request->name == null ? $republic->name : $request->name;
        $republic->description = $request->description == null ? $republic->description : $request->description;
        $republic->state = $request->state == null ? $republic->state : $request->state;
        $republic->city = $request->city == null ? $republic->city : $request->city;
        $republic->neighborhood = $request->neighborhood == null ? $republic->neighborhood : $request->neighborhood;
        $republic->address = $request->address == null ? $republic->address : $request->address;
        $republic->bathrooms = $request->bathrooms == null ? $republic->bathrooms : $request->bathrooms;
        $republic->allowedTo = $request->allowedTo == null ? $republic->allowedTo : $request->allowedTo;
        $republic->value = $request->value == null ? $republic->value : $request->value;
        $republic->tenant_id = $request->tenant_id == null ? $republic->tenant_id : $request->tenant_id;
    }

}
