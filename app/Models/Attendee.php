<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'attendee_id';

    /**
     * @var array $fillable
     */
    protected $fillable = ['event_id', 'user_id'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

