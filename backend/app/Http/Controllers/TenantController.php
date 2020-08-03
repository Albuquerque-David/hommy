<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TenantRequest;
use App\Tenant;

class TenantController extends Controller
{
    //
    // CRUD
    //
    public function createTenant(TenantRequest $request)
    {
        $tenant = new Tenant;
        
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

    public function updateTenant(TenantRequest $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        
        $this->fillTenant($tenant,$request);
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

    private function fillTenant(Tenant $tenant, TenantRequest $request)
    {
        $tenant->name = $request->name == null ? $tenant->name : $request->name;
        $tenant->email = $request->email == null ? $tenant->email : $request->email;
        $tenant->password = $request->password == null ? $tenant->password : $request->password;
        $tenant->cpf = $request->cpf == null ? $tenant->cpf : $request->cpf;
        $tenant->phoneNumber = $request->phoneNumber == null ? $tenant->phoneNumber : $request->phoneNumber;
    }
}
