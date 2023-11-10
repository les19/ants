<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ant extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'colony_id',
    ];
}
