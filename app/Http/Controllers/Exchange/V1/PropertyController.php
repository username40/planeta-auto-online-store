<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\PropertyValueRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    /**
     * @param PropertyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PropertyRequest $request)
    {
        $request->validated();


        $responseData = [
            'success' => false,
            'message' => ''
        ];

        if ($request->category_guid) {
            $category = Category::whereGuid($request->category_guid)->first();

            if ($category) {

                //todo sync deleting

                $property_arr = $request->property_arr;

                foreach ($property_arr as $property) {
                    $data = [
                        'name' => $property['name'],
                        'unit' => $property['unit'] ?? '',
                        'guid' => $property['guid'] ?? '',
                        'type' => $property['type'] ?? 'string',
                        'use_filter' => $property['use_filter'] ?? 0,
                        'use_analog' => $property['use_analog'] ?? 0,
                    ];

                    $property = Property::firstOrCreate($data);

                    if($category->properties()->save($property)) {
                        $responseData = [
                            'success' => true,
                            'message' => 'Saved'
                        ];
                    } else {
                        Log::alert('not saved: '.var_export($request->all()), 'exchange_property_update');
                    }
                }
            }

        }

        return response()->json($responseData);
    }

    public function updateValue(PropertyValueRequest $request) {
        $request->validated();


        $responseData = [
            'success' => false,
            'message' => ''
        ];

        $property = Property::whereGuid($request->property_guid)->first();
        $product = Product::whereGuid($request->product_guid)->first();

//        $product->property_values()->detach($product->property_values()->pluck('id'));

        if ($property) {

            $value = $request->value;

            $old_value = $property->values()->where('value', [$value])->first();
            if ($old_value) {
                $old_value->delete();
            }

            $data = [
                'value' => $value,
                'property_id' => $property->id,
            ];

            if($propertyValue = PropertyValue::firstOrCreate($data)) {
                $product->property_values()->save($propertyValue);
                $responseData = [
                    'success' => true,
                    'message' => 'Saved'
                ];
            } else {
                Log::alert('not saved: '.var_export($request->all()), 'exchange_property_value_update');
            }
        }

        return response()->json($responseData);
    }
}
