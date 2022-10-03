<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany('App\Models\Category');
    }

    public function visits() {
        return $this->belongsTo('App\Models\Visit');
    }
    
    public function comments() {
        return $this->belongsTo('App\Models\Comment');
    }
    
    public function suppliers() {
        return $this->belongsTo('App\Models\MovieSupplier');
    }
}
