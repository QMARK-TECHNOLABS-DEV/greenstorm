<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Modules\Admins\View\Components\AdminAppLayout;
use App\Modules\Admins\View\Components\EvaluatorAppLayout;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Contracts\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Azure Register
        Storage::extend('azure', function ($app, $config) {
            $client = BlobRestProxy::createBlobService(
                'DefaultEndpointsProtocol=https;AccountName='.$config['name'].
                ';AccountKey='.$config['key'].';EndpointSuffix=core.windows.net'
            
            ); 
        
            return new Filesystem(new AzureBlobStorageAdapter($client, $config['container']));
        });

        // Blade::component('admin-guest-layout', \App\View\Components\AdminGuestLayout::class);
        Blade::component('admin-app-layout', AdminAppLayout::class);
        Blade::component('evaluator-app-layout', EvaluatorAppLayout::class);
    }
}
