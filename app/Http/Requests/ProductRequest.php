<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class ProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'guid' => 'required|max:255',
            'category_guid' => 'required|max:255',
            'brand_guid' => 'required|max:255',
            'name' => 'max:255',
            'code' => 'max:255',
            'article' => 'max:255',
            'market_id' => 'max:255',
            'description' => 'max:2550',
            'is_active' => 'boolean',
        ];
    }
}
