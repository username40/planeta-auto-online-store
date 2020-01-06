<?php

namespace App\Http\Requests;


use App\Models\Image;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class ImageRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $typeClassesStr = implode(',', Image::$types);
        return [
            'guid' => 'required|max:255',
            'object_guid' => 'required|max:255',
            'object_type' => "in:$typeClassesStr",
            'extension' => 'required|max:255',
            'content' => 'required',
        ];
    }
}
