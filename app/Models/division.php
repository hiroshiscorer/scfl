<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'division_name',
        'season_id',
        'rounds',
        'misc'
    ];
}
