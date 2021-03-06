<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $api_namespace = 'App\Http\Controllers\Api';

    protected $admin_namespace = 'App\Http\Controllers\Admin';

    protected $guest_namespace = 'App\Http\Controllers\Guest';

    protected $friends_namespace = 'App\Http\Controllers\Friends';

    protected $wechat_namespace = 'App\Http\Controllers\WeChat';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapGuestRoutes();

        $this->mapFriendsRoutes();

        $this->mapWeChatRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->api_namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->admin_namespace)
            ->group(base_path('routes/admin.php'));
    }

    protected function mapGuestRoutes()
    {
        Route::prefix('guest')
            ->middleware('web')
            ->namespace($this->guest_namespace)
            ->group(base_path('routes/guest.php'));
    }

    protected function mapFriendsRoutes()
    {
        Route::prefix('friends')
            ->middleware('web')
            ->namespace($this->friends_namespace)
            ->group(base_path('routes/friends.php'));
    }

    protected function mapWeChatRoutes()
    {
        Route::prefix('wechat')
            ->middleware('web')
            ->namespace($this->wechat_namespace)
            ->group(base_path('routes/wechat.php'));
    }
}
