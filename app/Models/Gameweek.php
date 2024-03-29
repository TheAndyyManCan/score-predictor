<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fixture;

class Gameweek extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fixture()
    {
        return $this->hasMany(Fixture::class);
    }
}
