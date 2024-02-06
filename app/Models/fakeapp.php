<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakeapp extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'downloads', 'image'
    ];
}
