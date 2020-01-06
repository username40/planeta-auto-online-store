<?php

namespace App\Http\Controllers\Site;

use App\Models\AutoModelShort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoModelShortController extends Controller
{
    public function all() {
        return AutoModelShort::all();
    }
}
