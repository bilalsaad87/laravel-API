<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // to create you must add fillable
    protected $fillable = [
        'name',
        'Parent_ID'
    ];
}
