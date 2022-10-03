<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSupplier extends Model
{
    use HasFactory;

    public function movie() {
        return $this->hasOne('App\Models\Movie');
    }
    
    public function supplier() {
        return $this->hasOne('App\Models\Supplier');
    }
}
