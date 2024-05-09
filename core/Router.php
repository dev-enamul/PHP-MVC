<?php   
namespace app\core;
class Router
{
    protected array $routes = [];
    public $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
      $this->routes['get'][$path] = $callback;
    }

    

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false)
        {
            echo '404 - Page not found';
            exit;
        }
        echo call_user_func($callback);
    }
}