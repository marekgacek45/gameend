<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Blade;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Filament\Support\Facades\FilamentView;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->spa()
            ->id('admin')
            ->path('admin')
            ->login()
            ->passwordReset()
            // ->unsavedChangesAlerts()
            ->sidebarCollapsibleOnDesktop()
            ->favicon('/favicon/favicon.ico')
            ->brandLogo('/assets/logo.webp')
            ->brandLogoHeight(fn () => auth()->check() ? '40px' : '100px')
            ->colors([
                'primary' => Color::hex('#fb2ec5'),
                'gray' => Color::Slate
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
            ])
            ->navigationGroups([
                NavigationGroup::make()
                     ->label('Treści'),
                NavigationGroup::make()
                    ->label('Gry')
                    ->icon('heroicon-o-bug-ant'),
                NavigationGroup::make()
                    ->label('Kategorie i Tagi')
                    ->collapsed(),
            ])
            ->navigationItems([
                NavigationItem::make('Strona Główna')
                    ->url('http://localhost:8000', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt'),
                NavigationItem::make('Analityka')
                    ->url('https://analytics.google.com/', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-chart-pie'),

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

    public function register(): void
    {
        parent::register();
        FilamentView::registerRenderHook('panels::body.end', fn (): string => Blade::render("@vite('resources/js/app.js')"));
    }
}
