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
                'permission' => 'cctv-management',
                'submenu' => [
                    [
                        'text' => 'Role',
                        'url' => route('role.index'),
                        'active' => [route('role.index')],
                        'icon' => 'fas fa-bullseye',
                    ],
                    [
                        'text' => 'Departemen Head',
                        'url' => route('dep_head.index'),
                        'active' => [route('dep_head.index')],
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
                'permission' => 'approve',
            ]);

            $event->menu->add([
                'text' => 'IT Approval',
                'url' => route('it.index'),
                'active' => [route('it.index')],
                'icon' => '	fas fa-laptop',
                'permission' => 'cctv-management',
            ]);

            $event->menu->add([
                'text' => 'History',
                'url' => route('history.index'),
                'active' => [route('history.index')],
                'icon' => '	fas fa-laptop',
            ]);

        });

    }
}
