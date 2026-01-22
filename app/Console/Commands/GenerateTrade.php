<?php

namespace App\Console\Commands;
use App\Events\TradeCreated;

use Illuminate\Console\Command;

class GenerateTrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trade:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate random trade events';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $assets = ['BTCUSD', 'ETHUSD', 'XRPUSD'];
        $sides  = ['BUY', 'SELL'];

        $asset    = $assets[array_rand($assets)];
        $side     = $sides[array_rand($sides)];
        $quantity = rand(1, 100);
        $price    = rand(2000, 70000);

        event(new TradeCreated($asset, $side, $quantity, $price));

        $this->info("Trade generated: $asset $side $quantity @ $price");

        return Command::SUCCESS;
    }
}
