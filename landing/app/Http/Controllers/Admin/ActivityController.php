<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\JsonRpcClient;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $client = new JsonRpcClient();
        $data = $client->send('stat@get', [
            'page' => $request->page ?? 1,
            'perPage' => $request->perPage ?? 5
        ]);
        return view('admin/activity', ['data' => $data['result']]);
    }
}
