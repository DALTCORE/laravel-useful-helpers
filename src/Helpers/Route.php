<?php

namespace DALTCORE\Helpers;

class Route {

    /**
     * Get route name by given URI
     * @param null $uri
     * @param string $method
     * @return mixed
     * @throws \Exception
     */
    public static function getRouteNameByUri($uri = null, $method = 'GET')
    {
        if($uri == null){
            throw new \Exception('URI cannot be empty');
        }

        $routes = app('router')->getRoutes();

        foreach($routes->get() as $route)
        {
            $uri = trim($uri);
            $re = self::delete_all_between('{', '}', $route->uri());

            preg_match($re, trim($route->uri()), $matches);
            $explodeRoute = explode('/', $matches[0]);
            $explodeUri = explode('/', $uri);

            $build = [];
            foreach ($explodeRoute as $key => $part)
            {
                if(substr($part,0,1) == '{')
                {
                    $build[] = $explodeUri[$key];
                } else {
                    $build[] = $explodeRoute[$key];
                }
            }

            $build = implode('/', $build);

            if($build == $uri)
            {
               return $route->getName();
            }
        }
    }

    /**
     * Strip parameter from URL
     * @param $beginning
     * @param $end
     * @param $string
     * @return string
     */
    private static function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);

        if ($beginningPos === false || $endPos === false) {
            $string = str_replace('/', '\/', $string);
            $string = str_replace('_', '\_', $string);
            return '/'.$string.'/';
        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        $string = str_replace($textToDelete, '(.*)', $string);
        $string = str_replace('/', '\/', $string);
        $string = str_replace('_', '\_', $string);
        return '/'.$string.'/';
    }
}