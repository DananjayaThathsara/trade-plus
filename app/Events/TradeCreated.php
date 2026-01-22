<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class TradeCreated extends ShouldBeStored
{
    public function __construct(
        public string $asset,
        public string $side,
        public float $quantity,
        public float $price
    ) {}
}
