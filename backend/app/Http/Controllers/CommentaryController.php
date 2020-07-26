<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commentary;

class CommentaryController extends Controller
{
    //
    // CRUD
    //
    public function createCommentary(Request $request)
    {
        $commentary = new Commentary;        
        
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillCommentary($commentary,$request);

        if(!isset($commentary->renter) || $commentary->renter == null)
            return response()->json('Renter not found', 404);
        if(!isset($commentary->republic) || $commentary->republic == null)
            return response()->json('Republic not found', 404);

        $commentary->save();
        return response()->json($commentary, 201);
    }

    public function showCommentary($id)
    {
        $commentary = Commentary::findOrFail($id);
        if($commentary == null)
            return response()->json('Commentary not found.',404);
        
        return response()->json($commentary, 200);
    }

    public function listCommentaries()
    {
        $commentary = Commentary::all();
        return response()->json($commentary, 200);
    }

    public function updateCommentary(Request $request, $id)
    {
        $commentary = Commentary::findOrFail($id);
        if(!($this->validateRequest($request)))
            return response()->json('Bad format', 400);
        
        $this->fillCommentary($commentary,$request);

        if(!isset($commentary->renter) || $commentary->tenant == null)
            return response()->json('Renter not found', 404);
        if(!isset($commentary->republic) || $commentary->republic == null)
            return response()->json('Republic not found', 404);

        $commentary->save();
        return response()->json($commentary, 201);
    }

    public function deleteCommentary($id)
    {
        $commentary = Commentary::findOrFail($id);
        if($commentary == null)
            return response()->json('Commentary not found',404);

        Commentary::destroy($id);
        return response()->json(['Commentary ' . $id . ' deleted.'], 200);
    }

    //
    // Methods
    //

    private function validateRequest(Request $request)
    {
        $commentary = new Commentary;
        $this->fillCommentary($commentary, $request);

        if($commentary->commentary == null || $commentary->renter_id == null || $commentary->republic_id == null )
            return false;

        return true;
    }

    private function fillCommentary(Commentary $commentary, Request $request)
    {
        $commentary->commentary = $request->commentary == null ? $commentary->commentary : $request->commentary;
        $commentary->renter_id = $request->renter_id == null ? $commentary->renter_id : $request->renter_id;
        $commentary->republic_id = $request->republic_id == null ? $commentary->republic_id : $request->republic_id;
    }
}
