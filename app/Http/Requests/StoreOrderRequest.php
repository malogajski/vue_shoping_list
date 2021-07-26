<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:orders',
            ],
            'order_title' => [
                'string',
                'required',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'planned_at' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
        ];
    }
}
