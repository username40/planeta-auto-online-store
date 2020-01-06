<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class BrandRequest extends BaseRequest
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
            'name' => 'required|max:255',
            'description' => 'max:2550',
        ];
    }
}
