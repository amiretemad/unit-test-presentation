<?php


namespace App;


class Utils
{

    /**
     * @param string $idNumber
     * @return bool
     */
    public static function tcValidation(string $idNumber): bool
    {
        $notValid = ['1111111111', '2222222222', '3333333333', '4444444444'];
        if (isset($notValid[$idNumber])) {
            return false;
        }

        return true;
    }

}