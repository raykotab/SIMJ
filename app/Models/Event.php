<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'events';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'event_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'event_date',
        'event_begins',
        'event_ends',
        'creator_id',
        'created_at',
        'editor_id',
        'edited_at'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class, 'event_id', 'event_id');
    }
}

