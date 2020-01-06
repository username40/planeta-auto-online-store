<?php
/**
 * Created by PhpStorm.
 * User: flank
 * Date: 17.09.19
 * Time: 11:53
 */

namespace App\Http\Controllers\Site;

/**
 * TODO: причесать
 */
use App\Products\ProductsRepository;


class SearchController
{
    public function search(ProductsRepository $repository) {
        $items = [];
        $response = $repository->search(strval(request('q')));
        foreach ($response as $responseItem) {
            $items[] = $responseItem;
        }
        return $items;
    }
}
