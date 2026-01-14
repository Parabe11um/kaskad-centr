<?php
namespace App\Filament\Resources\UserResource\Widgets;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
class UserStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Пользователи', User::count()),
            Stat::make('Администраторы', User::where('role', User::ROLE_ADMIN)->count()),
            Stat::make('Редакторы', User::where('role', User::ROLE_EDITOR)->count()),
        ];
    }
}
