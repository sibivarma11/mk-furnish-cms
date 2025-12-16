<?php

namespace App\Filament\Resources\FormSubmissionResource\Pages;

use App\Models\FormSubmission;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FormSubmissionStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Submissions', FormSubmission::count())
                ->description('All form submissions')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
            
            Stat::make('Unread', FormSubmission::where('is_read', false)->count())
                ->description('Pending review')
                ->descriptionIcon('heroicon-m-eye-slash')
                ->color('warning'),
            
            Stat::make('Today', FormSubmission::whereDate('created_at', today())->count())
                ->description('Submissions today')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('success'),
        ];
    }
}