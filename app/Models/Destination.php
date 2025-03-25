<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'flight_time',
    ];

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function yesVotes()
    {
        return $this->votes()->where('vote', true);
    }

    public function noVotes()
    {
        return $this->votes()->where('vote', false);
    }
}
