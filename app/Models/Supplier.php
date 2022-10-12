<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo'
    ];

    public function movies() {
        return $this->belongsToMany('App\Models\Movie', 'movie_supplier', 'movie_id', 'supplier_id')->withPivot('page');
    }
}
