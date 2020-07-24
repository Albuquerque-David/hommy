<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepublicController extends Controller
{
    public function createRepublic(Request $request)
    {
        $republic = new Republic;
        $republic->name = $request->name;
        $republic->adress = $request->adress;
        $republic->save();
        return response()->json($republic);
    }

    public function showRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    public function listRepublic()
    {
        $republic = Republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic(Request $request, $id)
    {
        $republic = Republic::findOrFail($id);
        if($request->name)
            $this->name = $request->name;
        if($request->adress)
            $this->adress = $request->adress;
        $this->save();
        return response()->json($republic);

    }

    public function deleteRepublic($id)
    {
        Republic::destroy($id);
        return response()->json(['Produto {$id} deletado']);
    }

    public function addRepublic($id, $republic_id)
    {
        //Confirmar
        $tenant = Tenant::findOrFail($id);
        $republic = Republic::findOrFail($id);
        $tenant->republic_id = $republic_id;
        $tenant->save();
        return response()->json($tenant);
    }

    public function removeRepublic($id, $republica_id)
    {
        $tenant = User::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $tenant->republic_id = NULL;
        $tenant->save();
        return response()->json($tenant);

    }


}
