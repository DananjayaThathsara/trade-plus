<?php

namespace App\Jobs;

use App\Models\Trade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class RecalculateTradeStats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        Cache::put('trade.stats', [
            'total'  => Trade::count(),
            'open'   => Trade::where('status', 'OPEN')->count(),
            'volume' => Trade::sum('quantity'),
        ], now()->addMinutes(5));
    }
}
