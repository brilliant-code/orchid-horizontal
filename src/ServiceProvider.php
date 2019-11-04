<?php declare(strict_types=1);

namespace BrilliantCode\OrchidHorizontal;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider as Provider;
use Orchid\Platform\Dashboard;

class ServiceProvider extends Provider
{
    /** @var Dashboard */
    private $dashboard;

    public function boot(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;

        $this->registerResources();

        $this->app->booted(function () {
            $this->app['view']->replaceNamespace('platform', __DIR__ . '/../views/');
            $path = realpath(PLATFORM_PATH.'/resources/views');
            $this->loadViewsFrom($path, 'platform');
        });
    }

    private function registerResources(): self
    {
        $this->dashboard->addPublicDirectory('horizontal', __DIR__.'/../public/');

        View::composer('platform::app', function () {
            $this->dashboard->registerResource(
                'stylesheets',
                orchid_mix('/css/horizontal.css', 'horizontal')
            );
        });

        return $this;
    }
}
