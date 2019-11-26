<?php

namespace DALTCORE\Helpers\Traits\Models;

trait Encryptable
{
    /**
     * Parse decryptable keys
     *
     * @param $key
     * @return string
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable, true)) {
            $value = decrypt($value);
        }

        return $value;
    }

    /**
     * Parse encryptable keys
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable, true)) {
            $value = encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * When need to make sure that we iterate through
     * all the keys.
     *
     * @return array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();
        foreach ($this->encryptable as $key) {
            if (isset($attributes[$key])) {
                $attributes[$key] = decrypt($attributes[$key]);
            }
        }
        return $attributes;
    }
}
