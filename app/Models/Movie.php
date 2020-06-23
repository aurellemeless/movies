<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','cover','country_id'];

    public function genders(){
        return $this->belongsToMany('App\Models\Gender','movie_gender');
    }
    
    public function countries(){
        return $this->belongsTo('App\Models\Country');
    }
}
