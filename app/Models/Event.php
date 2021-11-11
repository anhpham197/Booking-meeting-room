<?php

namespace App\Models;

use \DateTimeInterface;
// use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
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
        'address',
        'full_name',
        'phone_number',
        'email',
        'start_day',
        'end_day',
        'start_time',
        'end_time',
        'partition_email',
        'description',
        'note',
        'file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
