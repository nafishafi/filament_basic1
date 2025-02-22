<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::incomes()->get()->sum('amount');
        $pengeluaran = Transaction::expenses()->get()->sum('amount');
        
        return [
            Stat::make('Total Pemasukan', $pemasukan)
                ->color('success'),
            Stat::make('Total Pengeluaran', $pengeluaran),
            Stat::make('Selisih', $pemasukan - $pengeluaran),
        ];
    }
}