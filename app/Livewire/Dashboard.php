<?php

namespace App\Livewire;

use App\Models\Trade;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $assetFilter = 'ALL';

    public function setAsset(string $asset): void
    {
        $this->assetFilter = $asset;
        $this->resetPage();
    }

    public function getStatsProperty(): array
    {
        return Cache::get('trade.stats', [
            'total'  => Trade::count(),
            'open'   => Trade::where('status', 'OPEN')->count(),
            'volume' => Trade::sum('quantity'),
        ]);
    }

    public function render()
    {
        $trades = Trade::query()
            ->when($this->assetFilter !== 'ALL', fn ($q) => $q->where('asset', $this->assetFilter))
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard', compact('trades'));
    }
}
