<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => route('home'),
                'active' => [route('home')],
                'icon' => 'fas fa-home',
            ]);

            $event->menu->add([
                'text' => 'Manajemen Otorisasi',
                'icon' => 'fas fa-user-shield',
                'submenu' => [
                    [
                        'text' => 'Role',
                        'url' => route('role.index'),
                        'active' => [route('role.index')],
                        'icon' => 'fas fa-bullseye',
                    ]
                ]
            ]);

            $event->menu->add([
                'text' => 'Form',
                'url' => route('form.index'),
                'active' => [route('form.index')],
                'icon' => 'fab fa-wpforms',
            ]);

            $event->menu->add([
                'text' => 'Approval',
                'url' => route('approval.index'),
                'active' => [route('approval.index')],
                'icon' => 'fab fa-wpforms',
            ]);

        });

    }
}
