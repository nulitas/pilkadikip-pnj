<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'password',
        'name',
        'major',
        'study',
        'generation',
    ];

    public $timestamps = false;

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
