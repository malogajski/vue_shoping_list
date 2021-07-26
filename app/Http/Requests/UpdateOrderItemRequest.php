<?php

namespace App\Http\Requests;

use App\Models\OrderItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_item_edit');
    }

    public function rules()
    {
        return [
            'order_id' => [
                'integer',
                'exists:orders,id',
                'required',
            ],
            'store_id' => [
                'integer',
                'exists:stores,id',
                'required',
            ],
            'item_id' => [
                'integer',
                'exists:items,id',
                'required',
            ],
            'quantity' => [
                'numeric',
                'min:0',
                'required',
            ],
            'real_price' => [
                'numeric',
                'nullable',
            ],
            'purchased' => [
                'boolean',
            ],
        ];
    }
}
