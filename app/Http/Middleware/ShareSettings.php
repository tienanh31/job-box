<?php

namespace App\Http\Middleware;

use App\Repositories\SettingRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ShareSettings
{
    protected mixed $settings;

    public function __construct(SettingRepository $settings)
    {
        $this->settings = $settings;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $settings = Cache::remember('settings', 60, function () {
            return $this->settings->getAllSettings();
        });

        view()->share('settings', $settings);

        return $next($request);
    }
}
