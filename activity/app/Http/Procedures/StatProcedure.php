<?php
declare(strict_types=1);

namespace App\Http\Procedures;

use App\Models\Stat;
use Sajya\Server\Procedure;

class StatProcedure extends Procedure
{
    public static string $name = 'stat';

    public function save(string $url, $dt)
    {
        $model = Stat::create(['url' => $url, 'dt' => $dt]);
        return $model;
    }

    public function get(int $page, int $perPage)
    {
        $data = Stat::selectRaw('url, count(*) as cnt, max(dt) as dt')
        ->groupBy('url')
        ->paginate($perPage, ['*'], 'page', $page);
        return $data;
    }
}
