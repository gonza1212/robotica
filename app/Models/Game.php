<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'visitor_id',
        'start',
        'set',
        'finished',
        'local_score',
        'visitor_score',
        'comments',
    ];

    public function local() {
        return $this->belongsTo(Robot::class, 'local_id');
    }

    public function visitor() {
        return $this->belongsTo(Robot::class, 'visitor_id');
    }
}
