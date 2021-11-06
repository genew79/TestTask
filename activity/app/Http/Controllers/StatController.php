<?php

namespace App\Http\Controllers;

use App\Models\Stat;

class StatController extends Controller
{
    public function index()
    {
        return Stat::selectRaw('url, count(*) as cnt, max(dt) as dt')
        ->groupBy('url')
        ->paginate(10);
    }
}
