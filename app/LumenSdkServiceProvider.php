<?php

namespace ImanRjb\LumenSdk;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class LumenSdkServiceProvider extends ServiceProvider
{
    public function register()
    {
        // For load config files
        if (file_exists(__DIR__ . '/../config/services.php')) {
            $this->mergeConfigFrom(__DIR__ . '/../config/services.php', 'jwt-auth');
        }

        if (! $this->app instanceof \Illuminate\Foundation\Application) {
            $this->app->register(\Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
            $this->app->register(\Irazasyed\Larasupport\Providers\ArtisanServiceProvider::class);
            $this->app->register(\Anik\Form\FormRequestServiceProvider::class);
        }

        $this->publishes([
            __DIR__.'/../config/services.php' => lumen_config_path('services.php')
        ], 'lumen-sdk');
    }

    public function boot()
    {
        if(config('services.remote_authorization')) {
            $this->app['auth']->viaRequest('api', function ($request) {
                $token = $request->bearerToken();
                if ($token) {
                    try {
                        $request = Http::withHeaders([
                            'Authorization' => 'Bearer ' . $token,
                            'Internal-Secret' => config('services.secret')
                        ])->get(config('services.auth_endpoint') . '/auth/info/internal');
                        return $request->json('data');
                    } catch (\Exception $exception) {
                        return;
                    }
                }
            });
        }
    }
}
