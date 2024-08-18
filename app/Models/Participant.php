<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the church that owns the Participant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class, 'church_id', 'id');
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'participant_group');
    }
}
