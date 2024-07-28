<?php

namespace Goldie\PeakSeo;

use Statamic\Providers\AddonServiceProvider;
use Goldie\PeakSeo\Actions\GenerateSocialImages;

class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        GenerateSocialImages::class
    ];

    protected $routes = [
        'web' => __DIR__ . '/../routes/web.php',
    ];

    protected $updateScripts = [
        \Goldie\PeakSeo\Updates\UpdateGlobalRenameWhatToAdd::class,
        \Goldie\PeakSeo\Updates\LayoutUpdateSectionToStack::class,
        \Goldie\PeakSeo\Updates\AddCookieNotice::class,
        \Goldie\PeakSeo\Updates\UpdatePrivacyAndCookieGlobalInstructions::class,
        \Goldie\PeakSeo\Updates\UseConsentBanner::class,
        \Goldie\PeakSeo\Updates\AddRejectAll::class,
    ];

    public function bootAddon()
    {
        $this->registerPublishableFieldsets();
        $this->registerPublishableViews();
    }

    protected function registerPublishableFieldsets()
    {
        $this->publishes([
            __DIR__ . '/../resources/fieldsets' => resource_path('fieldsets/vendor/statamic-vanilla-peak-seo'),
        ], 'statamic-vanilla-peak-seo-fieldsets');
    }

    protected function registerPublishableViews()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/statamic-vanilla-peak-seo'),
        ], 'statamic-vanilla-peak-seo-views');
    }
}
