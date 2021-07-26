<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:orders,number,' . request()->route('order')->id,
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
