<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventType extends Model
{
    use HasFactory;

     /**
     * @var string $table
     */
    protected $table = 'event_types';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'event_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'event_id',
        'background',
        'border',
        'text_color'
    ];

    public function style(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
