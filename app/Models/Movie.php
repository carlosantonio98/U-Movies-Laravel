<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id', 'user_id', 'created_at', 'updated_at', 'deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories() {
        return $this->belongsToMany('App\Models\Category');
    }

    public function visits() {
        return $this->belongsTo('App\Models\Visit');
    }
    
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function suppliers() {
        return $this->belongsTo('App\Models\MovieSupplier');
    }
}
