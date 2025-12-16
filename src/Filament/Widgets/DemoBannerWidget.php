<?php

namespace LaraCoreKit\DemoModule\Filament\Widgets;

use Filament\Widgets\Widget;

class DemoBannerWidget extends Widget
{
    protected static string $view = 'demo::filament.widgets.demo-banner';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = -100;

    public static function canView(): bool
    {
        return config('demo.enabled') && config('demo.banner.show_on_admin');
    }

    public function getCredentials(): array
    {
        return config('demo.credentials');
    }

    public function getResetInterval(): int
    {
        return config('demo.reset_interval');
    }
}
