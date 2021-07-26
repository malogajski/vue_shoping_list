<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'stores';

    protected $orderable = [
        'id',
        'title',
        'address',
        'city',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'title',
        'address',
        'city',
    ];

    protected $fillable = [
        'title',
        'address',
        'city',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
