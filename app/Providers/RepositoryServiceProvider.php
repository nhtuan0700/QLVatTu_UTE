<?php

namespace App\Providers;

use App\Repositories\PhieuBanGiao\PhieuBanGiaoInterface;
use App\Repositories\PhieuBanGiao\PhieuBanGiaoRepository;
use App\Repositories\PhieuMua\PhieuMuaInterface;
use App\Repositories\PhieuMua\PhieuMuaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PhieuMuaInterface::class, PhieuMuaRepository::class);
        $this->app->bind(PhieuBanGiaoInterface::class, PhieuBanGiaoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
