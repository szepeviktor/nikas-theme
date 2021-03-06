<?php

declare(strict_types=1);

namespace Brianvarskonst\Nikas;

use Brianvarskonst\Nikas\Provider\AssetProvider;
use Brianvarskonst\Nikas\Provider\BackwardCompatibilityProvider;
use Brianvarskonst\Nikas\Provider\DisableCoreFunctionalityProvider;
use Brianvarskonst\Nikas\Provider\NavigationProvider;
use Brianvarskonst\Nikas\Provider\TextdomainProvider;
use Brianvarskonst\Nikas\Provider\ThemeProvider;
use Brianvarskonst\Nikas\Provider\ThemeSupportProvider;
use Brianvarskonst\Nikas\Provider\ThumbnailProvider;
use Inpsyde\App\App;
use Inpsyde\App\Container;

if (is_readable(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

App::new(new Container())->boot();

add_action(
    App::ACTION_ADD_PROVIDERS,
    static function (App $app) {
        $app->addProvider(new BackwardCompatibilityProvider());
        $app->addProvider(new ThemeProvider());
        $app->addProvider(new AssetProvider());
        $app->addProvider(new ThemeSupportProvider());
        $app->addProvider(new DisableCoreFunctionalityProvider());
        $app->addProvider(new TextdomainProvider());
        $app->addProvider(new NavigationProvider());
        $app->addProvider(new ThumbnailProvider());
    }
);