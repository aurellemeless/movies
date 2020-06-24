<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    function index(Request $request){
        $data = Country::all();
        return response()->json($data);
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|unique:countries,name',
            'code' => 'required|max:3|unique:countries,code',
        ]);
        $record = new Country;
        $record->name = $request->name;
        $record->code = $request->code;
        $record->save();
        return response()->json($record);
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);
        $record = Country::findOrfail($id);
        $record->name = $request->name;
        $record->code = $request->code;
        $record->save();
        return response()->json($record);
    }

    
    function read(Request $request, $id){
        $record = Country::findOrfail($id);
        return response()->json($record);
    }
    
    function delete(Request $request, $id){
        
        $record = Country::findOrfail($id);
        $result = $record->delete();
        return response()->json($result);
    }
}
