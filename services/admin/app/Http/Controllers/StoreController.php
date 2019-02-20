<?php

/**
 * StoreController implementation
 * @author: Steven Rojas <steven.rojas@gmail.com>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Model\Store as Store;


class StoreController extends AbstractController {
    const MODEL = "App\Model\Store";
    use RestActions;

    public function all()
    {
        $m = self::MODEL;
        //$model = Store::paginate(5);
        $model = Store::where('number', 'like', '%0')->paginate(5)->withPath('custom/url');
        return response()->json($model, Response::HTTP_OK);
    }
}
