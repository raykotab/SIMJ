<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'attendees', 'event_id', 'user_id');
    }
}

