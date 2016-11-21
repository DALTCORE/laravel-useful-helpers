<?php

if (! function_exists('user_friendly_password')) {
    /**
     * Generate a user friendly password
     * @param int $length
     * @param bool $add_dashes
     * @param string $available_sets
     * @return string new password
     */
    function user_friendly_password($length = 9, $add_dashes = false, $available_sets = 'lud')
    {
        return \DALTCORE\Helpers\Text::generateStrongPassword($length, $add_dashes, $available_sets);
    }
}