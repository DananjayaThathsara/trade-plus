<div wire:key="dashboard-root" class="p-6 space-y-6 bg-slate-50 min-h-screen">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">TradePulse Dashboard</h1>
        <p class="text-sm text-slate-500">Real-time trading activity overview</p>
    </div>

    <!-- KPI CARDS-->
    <div wire:poll.keep-alive.5s class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-5">
            <div class="text-sm text-slate-500">Total Trades</div>
            <div class="mt-2 text-3xl font-bold text-slate-800">
                {{ $this->stats['total'] }}
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <div class="text-sm text-slate-500">Open Trades</div>
            <div class="mt-2 text-3xl font-bold text-green-600">
                {{ $this->stats['open'] }}
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <div class="text-sm text-slate-500">Total Volume</div>
            <div class="mt-2 text-3xl font-bold text-indigo-600">
                {{ number_format($this->stats['volume'], 2) }}
            </div>
        </div>
    </div>

    <!-- FILTER DROPDOWN -->
    <div x-data="{ open: false }" class="relative w-56">
        <label class="block text-sm font-medium text-slate-600 mb-1">
            Asset Filter
        </label>

        <button
            type="button"
            @click="open = !open"
            class="w-full flex justify-between items-center px-4 py-2 bg-white rounded-lg shadow-sm text-sm hover:bg-slate-50"
        >
            <span class="font-semibold text-indigo-600">
                {{ $assetFilter }}
            </span>

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <div
            x-cloak
            x-show="open"
            x-transition
            @click.outside="open = false"
            class="absolute z-20 mt-2 w-full bg-white rounded-lg shadow p-1"
        >
            <button
                type="button"
                wire:click.prevent="setAsset('ALL')"
                @click="open = false"
                class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 {{ $assetFilter === 'ALL' ? 'bg-indigo-50 text-indigo-600 font-semibold' : '' }}"
            >
                All Assets
            </button>

            <button
                type="button"
                wire:click.prevent="setAsset('BTCUSD')"
                @click="open = false"
                class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 {{ $assetFilter === 'BTCUSD' ? 'bg-indigo-50 text-indigo-600 font-semibold' : '' }}"
            >
                BTCUSD
            </button>

            <button
                type="button"
                wire:click.prevent="setAsset('ETHUSD')"
                @click="open = false"
                class="w-full text-left px-3 py-2 text-sm rounded hover:bg-slate-100 {{ $assetFilter === 'ETHUSD' ? 'bg-indigo-50 text-indigo-600 font-semibold' : '' }}"
            >
                ETHUSD
            </button>
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="font-semibold text-slate-800">Recent Trades</h2>
        </div>

        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Asset</th>
                    <th class="px-6 py-4 text-left">Side</th>
                    <th class="px-6 py-4 text-right">Quantity</th>
                    <th class="px-6 py-4 text-center">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($trades as $trade)
                    <tr wire:key="trade-{{ $trade->id }}" class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-medium">{{ $trade->asset }}</td>
                        <td class="px-6 py-4 font-semibold {{ $trade->side === 'BUY' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $trade->side }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            {{ number_format($trade->quantity, 4) }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                {{ $trade->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-slate-400">
                            No trades found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-4 bg-slate-50">
            {{ $trades->links() }}
        </div>
    </div>
</div>
