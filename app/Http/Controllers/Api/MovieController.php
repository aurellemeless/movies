<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Movie;


class MovieController extends Controller
{
    function index(Request $request){
        $data = Movie::with(['genders','country'])->paginate();
        return response()->json($data);
    }

    function store(Request $request){
        $request->validate([
            'title' => 'required',
            'genres' => 'array|required',
            'country_id' => 'required',
            'cover_file' => 'sometimes|image|max:2048', // 2MB 
        ]);
        $record = new Movie;
        $record->title = $request->title;
        $record->country_id = $request->country_id;
        if($request->has('description')){
            $record->description =  $request->description ;
        }
        if($request->hasFile('cover_file')){
            $record->cover = $request->file('cover_file')->store('covers','public');
        }
        $record->save();
        $record->genders()->sync($request->genres);
        $record->save();
        return response()->json($record);
    }

    function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'genres' => 'array|required',
            'country_id' => 'required',
            'cover_file' => 'sometimes|image|max:2048',
        ]);
        $record = Movie::findOrfail($id);
        $record->title = $request->title;
        $record->country_id = $request->country_id;
        if($request->has('description')){
            $record->description =  $request->description;
        }
        if($request->hasFile('cover_file')){
            if($record->cover){
                dd($record);
               Storage::disk('public')->delete($record->cover);
            }
            $record->cover = $request->file('cover_file')->store('covers','public');
        }
        $record->save();
        $record->genders()->sync($request->genres);
        $record->save();
        return response()->json($record);
    }

    
    function read(Request $request, $id){
        $record = Movie::findOrfail($id);
        return response()->json($record);
    }
    
    function delete(Request $request, $id){
        
        $record = Movie::findOrfail($id);
        if($record->cover){
            Storage::disk('public')->delete($record->cover);
         }
        $result = $record->delete();
        return response()->json($result);
    }
}
