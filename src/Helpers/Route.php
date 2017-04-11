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
}
