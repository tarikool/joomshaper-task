<?php

namespace app;


class Router
{

    private $routes = [];
    private $url;
    private $id;


    /**
     * Router constructor.
     * Get starting index from url
     */
    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $index = array_search(ROOT, $uri) ?: 0;

        $this->url = isset($uri[$index+1]) && $uri[$index+1] ? $uri[$index+1] : "/";
        $this->id = isset($uri[$index+2]) ? $uri[$index+2] : "";

    }


    public function get($url, $Class, $func)
    {
        array_push($this->routes,
            [
                'url' => $url,
                'method' => 'GET',
                'callable' => [new $Class, $func],
            ]
        );



//        if (is_callable([new $Class, $method])) {
//            return call_user_func_array([new $Class, $method], [2]);
//        }


    }




    public function post($url, $Class, $func)
    {
        array_push($this->routes,
            [
                'url' => $url,
                'method' => 'POST',
                'callable' => [new $Class, $func],
            ]
        );

    }




    public function dispatch()
    {
        $res = array_filter($this->routes, function ($route) {

            if ($this->id){
                $this->url .= '/id';
            }

            return $route['url'] == $this->url && $_SERVER['REQUEST_METHOD'] == $route['method'];
        });

        $res = array_shift($res);

        if ($res){
            return call_user_func_array($res['callable'], [$this->id]);
        } else {

           die('Method not found');
        }
    }



}
