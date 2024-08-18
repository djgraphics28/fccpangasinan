<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'participant_group');
    }
}
