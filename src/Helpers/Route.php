<?php

namespace DALTCORE\Helpers;

class Route {

    /**
     * Get route name by given URI
     *
     * @param null|string $uri
     * @param string $method
     *
     * @return mixed
     */
    public static function getRouteNameByUri($uri = null, $method = 'GET')
    {
        $route = null;

        try {
            $route = app('router')->getRoutes()->match(app('request')->create($uri));
        } catch (NotFoundHttpException $exception) {
            return null;
        }

        if ($route) {
            return $route->getName();
        }

        return null;
    }
}
