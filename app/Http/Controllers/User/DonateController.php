<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function __invoke()
    {
        // $currency = Currency::query()->get();

        // for ($i = 0; $i < 100; $i++) {
        //     Donate::query()->forceCreate([
        //         'created_at' => now()->subDays(rand(0, 100)),
        //         'currency_id' => $currency->random()->id,
        //         'amount' => rand(1, 1000),
        //     ]);
        // }

        // echo 'ok';

        // now()->subMonth()->startOfMonth())
        //     ->where('created_at', '<=', now()->subMonth()->endOfMonth()) фильтрация сколько было полученно донатов за прошлый месяц

        // $stats = [
        //     'total_count' => Donate::query()
        //         ->count(), // возвращает кол-во записей в табл
        //     'total_sum' => Donate::query()
        //         ->sum('amount'), // возвращает сумму колонки
        //     'amount_avg' => Donate::query()
        //         ->avg('amount'), // возвращает среднее сумму значение
        //     'amount_min' => Donate::query()
        //         ->min('amount'), // возвращает мин значение, так же max (максимальное)
        //     'amount_max' => Donate::query()
        //         ->max('amount'), // возвращает мин значение, так же max (максимальное)
        // ];

        $statistics = Donate::query()
            ->select(['currency_id'])
            ->selectRaw('count(*) as total_count') // для чистых SQL запросов в BD (не исп. пересенные внутри) 
            ->selectRaw('sum(amount) as total_sum') // для чистых SQL запросов в BD (не исп. пересенные внутри)
            ->selectRaw('avg(amount) as amount_avg') // для чистых SQL запросов в BD (не исп. пересенные внутри)
            ->selectRaw('min(amount) as amount_min') // для чистых SQL запросов в BD (не исп. пересенные внутри)
            ->selectRaw('max(amount) as amount_max') // для чистых SQL запросов в BD (не исп. пересенные внутри)
            ->groupBy('currency_id')
            ->get(); // Чтоб избежать большого кол-во SQL запросов, соединив в один
        //dd($stats->toArray());

        return view('user.donates.index', compact('statistics'));
    }
}
