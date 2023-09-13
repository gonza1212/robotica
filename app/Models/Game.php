<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'local',
        'visitor',
        'start',
        'set',
        'finished',
        'local_score',
        'visitor_score',
        'comments',
    ];

    public function robots() {
        return $this->belongsToMany(Robot::class);
    }
}
