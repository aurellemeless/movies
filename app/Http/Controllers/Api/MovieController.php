<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Movie;
use App\Http\Requests\StoreUpdateMovie;


class MovieController extends Controller
{
    function index(Request $request){
        $data = Movie::with(['genders','country'])->paginate();
        return response()->json($data);
    }

    
    function search(Request $request){
        $query = Movie::with(['genders','country']);
        if($request->has('q')){
            $q = $request->q;
            $query->where('title','like', '%'.$q.'%');
        }
        $data = $query->paginate();
        return response()->json($data);
    }


    function store(StoreUpdateMovie $request){
        
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

    function update(StoreUpdateMovie $request, $id){
        
        $record = Movie::findOrfail($id);
        $record->title = $request->title;
        $record->country_id = $request->country_id;
        if($request->has('description')){
            $record->description =  $request->description;
        }
        if($request->hasFile('cover_file')){
            if($record->cover){
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
        $record = Movie::with(['genders','country'])->findOrfail($id);
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
