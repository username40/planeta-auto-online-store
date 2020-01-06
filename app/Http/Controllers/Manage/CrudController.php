<?php

namespace App\Http\Controllers\Manage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class CrudController extends Controller
{
    /**
     * @return Model
     */
    abstract public static function getModel();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request);
        return response()->json($itemsQuery->paginate(15));
    }

    /**
     * Формирование Builder с сортировкой и фильтрацией
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function gridQuery(Request $request) {
        $itemsQuery = static::getModel()::query();
        $orderField = $request->get('sortBy', 'id');
        $orderDesc = $request->get('descending', false);
        $orderDesc = $orderDesc == 'true' ? true : false;
        $searchParams = $request->get('search', []);
        if (!empty($orderField)) {
            if($orderDesc) {
                $itemsQuery->orderByDesc($orderField);
            } else {
                $itemsQuery->orderBy($orderField);
            }
        }

        if(!empty($searchParams)) {
            foreach ($searchParams as $searchParamkey => $searchParam) {
                if(is_array($searchParam)) {
                    if(isset($searchParam['from'])) {
                        $itemsQuery->where($searchParamkey, '>=', $searchParam['from']);
                    }
                    if(isset($searchParam['to'])) {
                        $itemsQuery->where($searchParamkey, '<=', $searchParam['to']);
                    }
                } else {
                    $itemsQuery->where($searchParamkey, 'like', '%'.$searchParam.'%');
                }
            }
        }

        return $itemsQuery;
    }
}
