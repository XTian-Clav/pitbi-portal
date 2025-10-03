<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Enums\ThemeMode;

class IncubateePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('incubatee')
            ->path('incubatee')
            ->login()
            ->profile()
            ->profile(isSimple: false)
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->emailChangeVerification()
            ->authGuard('web')

            #Styling
            ->font('Poppins')
            ->brandName('PITBI Portal')
            ->brandLogoHeight('2rem')
            ->brandLogo(asset('assets/logo/logo-colored.png'))
            ->darkModeBrandLogo(asset('assets/logo/logo-white.png'))
            ->favicon(asset('assets/favicon/favicon.ico'))
            ->defaultThemeMode(ThemeMode::Light)
            ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Gray,
                'success' => Color::Green,
                'danger' => Color::Red,
                'warning' => Color::Yellow,
                'info' => Color::Indigo,
            ])

            
            ->discoverResources(in: app_path('Filament/Incubatee/Resources'), for: 'App\Filament\Incubatee\Resources')
            ->discoverPages(in: app_path('Filament/Incubatee/Pages'), for: 'App\Filament\Incubatee\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Incubatee/Widgets'), for: 'App\Filament\Incubatee\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
