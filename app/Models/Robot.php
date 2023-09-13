<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Robot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'school_id',
        'picture',
        'status',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function games() {
        return $this->hasMany(Game::class);
    }
}
