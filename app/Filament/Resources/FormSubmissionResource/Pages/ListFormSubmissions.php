<?php

namespace App\Filament\Resources\FormSubmissionResource\Pages;

use App\Filament\Resources\FormSubmissionResource;
use App\Models\EmailSetting;
use App\Models\FormSubmission;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ListFormSubmissions extends ListRecords
{
    protected static string $resource = FormSubmissionResource::class;

    public function mount(): void
    {
        parent::mount();
        
        $this->checkEmailConfiguration();
    }

    protected function checkEmailConfiguration(): void
    {
        $requiredSettings = [
            'mail_host',
            'mail_username', 
            'mail_password',
            'mail_from_address',
            'contact_form_recipient'
        ];

        $missingSettings = [];
        foreach ($requiredSettings as $setting) {
            if (empty(EmailSetting::get($setting))) {
                $missingSettings[] = $setting;
            }
        }

        if (!empty($missingSettings)) {
            Notification::make()
                ->warning()
                ->title('Email Configuration Required')
                ->body('Please configure email settings before managing form submissions to get notified.')
                ->actions([
                    \Filament\Notifications\Actions\Action::make('configure')
                        ->label('Configure Now')
                        ->url('/admin/email-settings')
                ])
                ->persistent()
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [];
    }


}