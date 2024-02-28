<?php
namespace SamyBgt\Screenwidth;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\App;
use Illuminate\Routing\Router;

class ScreenwidthServiceProvider extends ServiceProvider {


  public $routeFilePath = '/routes/screenwidth.php';

  public function boot(\Illuminate\Routing\Router $router)
  {
    $this->loadViewsWithFallbacks();

    $this->registerMiddlewareGroup($this->app->router);

    $this->setupRoutes($this->app->router);
}

    public function loadViewsWithFallbacks()
    {
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'screenwidth');
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

  public function register()
  {

  }


  static public function checkLoading()
  {
    return 'Hii, it is loading';
  }
}
?>