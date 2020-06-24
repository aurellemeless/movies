<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    function index(Request $request){
        $data = Gender::all();
        return response()->json($data);
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|unique:genders,name',
        ]);
        $record = new Gender;
        $record->name = $request->name;
        $record->save();
        return response()->json($record);
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $record = Gender::findOrfail($id);
        $record->name = $request->name;
        $record->save();
        return response()->json($record);
    }

    
    function read(Request $request, $id){
        $record = Gender::findOrfail($id);
        return response()->json($record);
    }
    
    function delete(Request $request, $id){
        
        $record = Gender::findOrfail($id);
        $result = $record->delete();
        return response()->json($result);
    }
}
