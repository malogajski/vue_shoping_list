<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'order_items';

    protected $casts = [
        'purchased' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'order.number',
        'store.title',
        'item.title',
        'quantity',
        'real_price',
    ];

    protected $orderable = [
        'id',
        'order.number',
        'store.title',
        'item.title',
        'quantity',
        'real_price',
        'purchased',
    ];

    protected $fillable = [
        'order_id',
        'store_id',
        'item_id',
        'quantity',
        'real_price',
        'purchased',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
