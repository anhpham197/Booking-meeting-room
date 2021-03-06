<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'events';


    protected $dates = [
        'start_day',
        'end_day',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'user_id',
        'starting_time',
        'ending_time',
        'room_id',
        'note',
        'file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function host() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setEmailListAttribute($value)
    {
        $this->attributes['partition_email'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getEmailListAttribute($value)
    {
        return $this->attributes['partition_email'] = json_decode($value);
    }

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d H:i:s');
    // }
}
