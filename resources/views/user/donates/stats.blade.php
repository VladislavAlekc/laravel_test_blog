@foreach ($statistics as $stats)
    <h4 class="mb-3">{{ __('Статистика для :currency', ['currency' => $stats->currency_id]) }}</h4>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 text-muted small"> Кол-во донатов</div>
                    <h4>{{ $stats['total_count'] }}</h4>

                </div>
            </div>

        </div>
        <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 text-muted small">Общая сумма донатов</div>
                    <h4>{{ __money($stats['total_sum'], $stats['currency_id']) }}</h4>

                </div>
            </div>

        </div>
        <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 text-muted small">Средня сумма донатов</div>
                    <h4>{{ __money($stats['amount_avg'], $stats['currency_id']) }}</h4>

                </div>
            </div>

        </div>
        <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 text-muted small">Минимальная сумма донатов</div>
                    <h4> {{ __money($stats['amount_min'], $stats['currency_id']) }}</h4>

                </div>
            </div>

        </div>

        <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-2 text-muted small">Максимальная сумма донатов</div>
                    <h4>{{ __money($stats['amount_max'], $stats['currency_id']) }}</h4>

                </div>
            </div>

        </div>
    </div>
@endforeach
