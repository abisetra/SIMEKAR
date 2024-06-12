<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Auth\Events\Login;
use Auth;
use DB;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Departement;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {

        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = Auth::user();
            $karyawan_id = Karyawan::where('users_id', $user->id)->first();

            // Master Data dengan Dynamic Counter

            $event->menu->addAfter('dashboard', [
                'key' => 'master_data',
                'text' => 'Master Data',
                'icon'    => 'fas fa-fw fa-laptop',
                'can' => ['admin', 'hrd'],
            ]);

            $event->menu->addIn('master_data', [
                'key' => 'jabatan',
                'text' => 'Jabatan',
                'url' => '/jabatan',
                'label' => Jabatan::count(),
                'active' => ['jabatan'],
            ]);

            $event->menu->addAfter('jabatan', [
                'key' => 'departement',
                'text' => 'Unit Departement',
                'url' => '/departement',
                'label' => Departement::count(),
            ]);


            // Master Karyawan dengan Dynamic Counter
            $event->menu->addAfter('dashboard', [
                'key' => 'master_karyawan',
                'text' => 'Master Karyawan',
                'icon'    => 'fas fa-fw fa-users',
                'can' => ['admin', 'hrd', 'direktur'],
            ]);

            $event->menu->addIn('master_karyawan', [
                'key' => 'data_karyawan',
                'text' => 'Data Karyawan',
                'url' => '/karyawan',
                'label' => Karyawan::count(),
                'active' => ['karyawan', 'karyawan/*'],
            ]);

            $event->menu->addAfter('data_karyawan', [
                'key' => 'permohonan_cuti',
                'text' => 'Permohonan Cuti',
                'url' => '/cuti',
                'active' => ['cuti', 'cuti/*'],
            ]);

            $event->menu->addAfter('permohonan_cuti', [
                'key' => 'teguran_karyawan',
                'text' => 'Teguran',
                'url' => '/teguran',
                'active' => ['teguran', 'teguran/*'],
            ]);

            //Master Web
            $event->menu->addAfter('master_karyawan', [
                'key' => 'master_web',
                'text' => 'Master Web',
                'can' => ['admin'],
                'icon'    => 'fas fa-fw fa-globe',
            ]);

            $event->menu->addIn('master_web', [
                'key' => 'web_settings',
                'text' => 'Web Settings',
                'url' => '/websettings',
                'can' => ['admin'],
                'active' => ['websettings', 'websettings/*'],
            ]);

            // Master Karyawan dengan Dynamic Counter
            $event->menu->addAfter('dashboard', [
                'key' => 'karyawan',
                'text' => 'Karyawan',
                'icon'    => 'fas fa-fw fa-user',
                'can' => ['karyawan'],
            ]);


            $event->menu->addIn('karyawan', [
                'key' => 'teguran_karyawan',
                'text' => 'Teguran',
                'url' => '/teguran',
            ]);
            $event->menu->addAfter('teguran_karyawan', [
                'key' => 'cuti_karyawan',
                'text' => 'Cuti',
                'url' => '/cuti',
                'can' => ['karyawan'],
            ]);
            $event->menu->add('ACCOUNT SETTINGS', [
                'key' => 'data_diri',
                'text' => 'Data Diri',
                'icon'    => 'fas fa-fw fa-book',
                'url' => route('karyawan.profile', ['id' => $karyawan_id]),
                'active' => ['biodata', 'biodata/*'],
            ]);
            $event->menu->addAfter('data_diri', [
                'key' => 'logout',
                'text' => 'Logout',
                'url' => '/logout',
                'icon' => 'fas fa-fw fa-door-open',
            ]);
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
