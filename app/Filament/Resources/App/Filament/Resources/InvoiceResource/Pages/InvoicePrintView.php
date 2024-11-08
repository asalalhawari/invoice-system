<?php

namespace App\Filament\Resources\App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\App\Filament\Resources\InvoiceResource;
use Filament\Resources\Pages\Page;

class InvoicePrintView extends Page
{
    protected static string $resource = InvoiceResource::class;

    protected static string $view = 'filament.resources.app.filament.resources.invoice-resource.pages.invoice-print-view';
}
