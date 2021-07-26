<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'title',
        'description',
        'price',
        'prefered_store',
    ];

    protected $filterable = [
        'id',
        'title',
        'description',
        'price',
        'prefered_store',
    ];

    protected $fillable = [
        'title',
        'description',
        'price',
        'prefered_store',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
