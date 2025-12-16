<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }



    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['image_file'])) {
            $data['image'] = \Illuminate\Support\Facades\Storage::disk('public')->get($data['image_file']);
            unset($data['image_file']);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
