<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class OrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required_without:email',
            'email' => 'required_without:phone',
            'items' => 'required',
            'items.*.product_id' => 'required',
            'items.*.quantity' => 'required',
        ];
    }
}
