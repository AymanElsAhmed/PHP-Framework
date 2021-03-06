<?php

namespace app\core;


class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     * @param  Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $this->request = $request;
    }


    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

     public function resolve()
    {
     /*   echo "<pre>";
        var_dump($this->routes);
        echo "</pre>";*/
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false){
            $this->response->statusCode(404);
            return "Not Found";

        }
        if (is_string($callback)){
            return $this->renderView($callback);
        }

        if (is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
       return call_user_func($callback, $this->request);

    }

    public function renderView($view, $params = [])
    {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view, $params);
            return str_replace('{{content}}', $viewContent,$layoutContent);

    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params){
        foreach ($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}