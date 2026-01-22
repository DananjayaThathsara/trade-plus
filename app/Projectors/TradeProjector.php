<?php

namespace App\Projectors;

use App\Events\TradeCreated;
use App\Models\Trade;
use Illuminate\Support\Facades\Cache;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class TradeProjector extends Projector
{
    public function onTradeCreated(TradeCreated $event): void
    {
        // Create trade record
        Trade::create([
            'asset'    => $event->asset,
            'side'     => $event->side,
            'quantity' => $event->quantity,
            'price'    => $event->price,
            'status'   => 'OPEN',
        ]);

        // Recalculate and cache stats
        Cache::forever('trade.stats', [
            'total'  => Trade::count(),
            'open'   => Trade::where('status', 'OPEN')->count(),
            'volume' => Trade::sum('quantity'),
        ]);
    }
}
