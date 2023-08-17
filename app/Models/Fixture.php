<?php

namespace App\Models;

use \App\Models\Gameweek;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gameweek()
    {
        return $this->belongsTo(Gameweek::class);
    }
}
