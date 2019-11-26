<?php

namespace DALTCORE\Helpers\Traits\Models;

trait Jsonable
{

    /** @var array */
    protected $jsonable = [];

    /**
     * Set json attributes
     *
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->jsonable, true)) {
            if (is_array($value)) {
                $this->attributes[$key] = json_encode($value);
            } else {
                parent::setAttribute($key, $value);
            }
        } else {
            parent::setAttribute($key, $value);
        }
    }

    /**
     * Get json attributes
     *
     * @param $key
     *
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (in_array($key, $this->jsonable, true)) {
            if (is_json(parent::getAttribute($key))) {
                return json_decode(parent::getAttribute($key));
            } else {
                return parent::getAttribute($key);
            }
        } else {
            return parent::getAttribute($key);
        }
    }
}
