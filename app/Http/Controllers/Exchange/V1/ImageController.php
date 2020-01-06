<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageDeleteRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    /**
     * @param ImageRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(ImageRequest $request)
    {
        $responseData = [
            'success' => false,
            'message' => ''
        ];

        if($request['object_type'] == Image::MODEL_TYPE_PRODUCT) {
            $bindModel = Product::where('guid', $request->object_guid)->first();
        } elseif($request['object_type'] == Image::MODEL_TYPE_BRAND) {
            $bindModel = Brand::where('guid', $request->object_guid)->first();
        } else {
            throw new \Exception('Undefined Class Type: ' . $request['guid'] .' '. $request['object_type']);
        }

        $request->validated();

        $imageName = Str::random(32).'.'.$request['extension'];
        //todo вынести в константы или в конфиг
        $filePath = '/public/products/'.$imageName;
        $fileSaved = \Storage::disk('local')->put($filePath, base64_decode($request['content']));
        if(!$fileSaved) {
            throw new \Exception('Image not saved: ' . $request['guid']);
        }

        $imageModel = Image::firstOrCreate(['guid' => $request['guid']]);
        $imageModel->update([
            'model_id' => $bindModel->id,
            'path' => $filePath,
            'name' => $request->name,
        ]);

        $bindModel->images()->save($imageModel);
        if($imageModel->update()) {
            $responseData['success'] = true;
            $responseData['message'] = 'Saved';
        } else {
            \Log::alert('not saved: '.var_export($request['guid']), 'exchange_image_update');
        }
        return response()->json($responseData);
    }

    /**
     * @param ImageDeleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(ImageDeleteRequest $request) {
        $responseData = [
            'success' => false,
            'message' => ''
        ];
        $request->validated();
        if($imageModel = Image::whereGuid($request->guid)->first()) {
            $deleted = unlink(storage_path('app').$imageModel->path);
            if(!$deleted) {
                throw new \Exception('Unlick error: ' . $imageModel->path);
            }
            $imageModel->delete();
            $responseData['success'] = true;
            $responseData['message'] = 'Deleted';
        }
        return response()->json($responseData);
    }
}
