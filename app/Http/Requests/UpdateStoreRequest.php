<?php

namespace App\Http\Requests;

use App\Models\Store;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('store_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:stores,title,' . request()->route('store')->id,
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
        ];
    }
}
