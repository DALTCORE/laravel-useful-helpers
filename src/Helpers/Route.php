<?php

namespace DALTCORE\Helpers;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        
        if($uri === null) {
			$uri = \URL::current();
		}

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
