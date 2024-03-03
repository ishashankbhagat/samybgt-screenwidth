<?php
namespace SamyBgt\Screenwidth;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\App;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;

class ScreenwidthServiceProvider extends ServiceProvider {


  public $routeFilePath = '/routes/screenwidth.php';

  public function boot(\Illuminate\Routing\Router $router)
  {
    $this->loadViewsWithFallbacks();

    $this->loadConfigs();

    $this->registerMiddlewareGroup($this->app->router);

    $this->setupRoutes($this->app->router);

    $this->loadBladeDirectives();

    $this->publishFiles();

  }

  public function loadViewsWithFallbacks()
  {

    $webappViewFolder = resource_path('views/vendor/samybgt/screenwidth');
    if (file_exists($webappViewFolder)) {
      $this->loadViewsFrom($webappViewFolder, 'screenwidth');
    }

    $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'screenwidth');
  }


  public function loadConfigs()
  {
    // use the vendor configuration file as fallback
    $this->mergeConfigFrom(__DIR__.'/config/samybgt/screenwidth.php', 'samybgt.screenwidth');

  }


  public function registerMiddlewareGroup(Router $router)
  {
    // dd($this->app);
    $middleware_class = [
    \Samybgt\Screenwidth\app\Http\Middleware\Screenwidth::class,
    ];

    foreach ($middleware_class as $middleware_class) {
      $router->pushMiddlewareToGroup('screenwidth',$middleware_class);
    }
  }


  public function setupRoutes(Router $router)
  {
    $routeFilePathInUse = __DIR__.$this->routeFilePath;

    $this->loadRoutesFrom($routeFilePathInUse);
  }




  public function loadBladeDirectives()
  {
    Blade::directive('screenwidth_reportWindowSize', function(){
      return view('screenwidth::screenwidth.reportWindowSize');
    });
  }



  public function publishFiles()
  {
    $screenwidth_config_files = [__DIR__.'/config' => config_path()];

    // establish the minimum amount of files that need to be published, for screenwidth to work; there are the files that will be published by the install command
    $minimum = array_merge(
    $screenwidth_config_files,
    );

    // register all possible publish commands and assign tags to each
    $this->publishes($screenwidth_config_files, 'config');
  }



  public function loadHelpers()
  {
    require_once __DIR__.'/helpers.php';
  }

  public function register()
  {
    $this->loadHelpers();

  }





  static public function checkLoading()
  {
    return 'Hii, it is loading';
  }


}
?>
