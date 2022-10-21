<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id'];

    public function movie() {
        return $this->belongsTo('App\Models\Movie');
    }
}
