<?php

namespace App\Providers;

use App\Models\NguoiDung;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app->auth->provider('customUser', function ($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });

        $ADMIN = ['nguoidung-list', 'nguoidung-create', 'nguoidung-edit'];
        $CSVC = [
            'phieudenghi-xetduyet',
            'phieubangiao-list', 'phieubangiao-create', 'phieubangiao-edit', 'phieubangiao-detail', 'phieubangiao-delete',
            'vattu-list', 'vattu-create', 'vattu-edit', 'vattu-delete',
            'thongke', 'hanmuc'
        ];
        $QLVT = [
            'phieumua-list', 'phieumua-create', 'phieumua-detail', 'phieumua-edit', 'phieumua-delete', 'phieumua-finish',
            'phieubangiao-xacnhan', 'phieubangiao-list', 'vattu-list'
        ];
        $GV = [
            'phieusua-list', 'phieusua-create', 'phieusua-detail', 'phieusua-edit', 'phieusua-delete', 'phieusua-finish',
            'vattu-list'
        ];
        $array = array_unique(array_merge($ADMIN, $CSVC, $QLVT, $GV));

        if (!$this->app->runningInConsole()) {
            foreach ($array as $item) {
                Gate::define($item, function ($user) use ($item, $ADMIN, $CSVC, $QLVT, $GV) {
                    switch ($user->LoaiTK) {
                        case NguoiDung::ADMIN:
                            return in_array($item, $ADMIN);
                        case NguoiDung::CSVC:
                            return in_array($item, $CSVC);
                        case NguoiDung::QLVT:
                            return in_array($item, $QLVT);
                        case NguoiDung::GV:
                            return in_array($item, $GV);
                        default:
                            return false;
                    }
                });
            }
        }
    }
}
