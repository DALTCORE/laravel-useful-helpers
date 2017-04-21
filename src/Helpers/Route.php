<?php

namespace DALTCORE\Helpers;

use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Route
{

    /**
     * Get route name by given URI
     *
     * @param null|string $uri
     * @param string      $method
     *
     * @return mixed
     */
    public static function getRouteNameByUri($uri = NULL, $method = 'GET')
    {
        $route = NULL;

        if ($uri === NULL) {
            $uri = \URL::current();
            $method = Request::instance()->getMethod();
        }

        try {
            $route = app('router')->getRoutes()->match(app('request')->create($uri, $method));
        } catch (NotFoundHttpException $exception) {
            return NULL;
        }

        if ($route) {
            return $route->getName();
        }

        return NULL;
    }
    
     /**
     * check if the given route name(s) are matching with the current route name
     *
     * @param  array $routeName
     * @return boolean
     */
    public static function isActiveRoute($routeName)
    {
        return in_array(route_name(), $routeName);
    }

    /**
     * Check if the current uri contains the given uri
     *
     * @param  string  $uri
     * @param  boolean $strict
     * @return boolean
     */
    public static function isActiveUri($uri, $strict = false)
    {
        if($strict) {
            return Request::is($uri);
        }
            
        return Request::is('*' . $uri . '*');
    }
}
