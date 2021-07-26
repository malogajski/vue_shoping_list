<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'planned_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'number',
        'order_title',
        'user.name',
        'planned_at',
    ];

    protected $filterable = [
        'id',
        'number',
        'order_title',
        'user.name',
        'planned_at',
    ];

    protected $fillable = [
        'number',
        'order_title',
        'user_id',
        'planned_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPlannedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setPlannedAtAttribute($value)
    {
        $this->attributes['planned_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
