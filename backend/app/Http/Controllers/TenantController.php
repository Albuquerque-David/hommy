<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;

class TenantController extends Controller
{
    //
    // CRUD
    //
    public function createtenant(Request $request)
    {
        $tenant = new Tenant;

        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillTenant($tenant,$request);
        $tenant->save();
        return response()->json($tenant, 201);
    }

    public function showTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        if($tenant == null)
            return response()->json('Tenant not found.',404);
        
        return response()->json($tenant, 200);
    }

    public function listTenants()
    {
        $tenant = Tenant::all();
        return response()->json($tenant, 200);
    }

    public function updateTenant(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->filltenant($tenant,$request);
        $tenant->save();
        return response()->json($tenant, 201);
    }

    public function deleteTenant($id)
    {
        $tenant = Tenant::findOrFail($id);
        if($tenant == null)
            return response()->json('Tenant not found',404);

        tenant::destroy($id);
        return response()->json(['Tenant ' . $id . ' deleted.'], 200);
    }

    //
    // Methods
    //

    private function validateRequest(Request $request)
    {
        $tenant = new Tenant;
        $this->fillTenant($tenant, $request);

        if($tenant->name == null || $tenant->email == null || $tenant->password == null 
            || $tenant->cpf == null || $tenant->phoneNumber == null )
            return false;

        return true;
    }

    private function fillTenant(Tenant $tenant, Request $request)
    {
        $tenant->name = $request->name == null ? $tenant->name : $request->name;
        $tenant->email = $request->email == null ? $tenant->email : $request->email;
        $tenant->password = $request->password == null ? $tenant->password : $request->password;
        $tenant->cpf = $request->cpf == null ? $tenant->cpf : $request->cpf;
        $tenant->phoneNumber = $request->phoneNumber == null ? $tenant->phoneNumber : $request->phoneNumber;
    }
}
