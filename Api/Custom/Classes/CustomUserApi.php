<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\UserApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserApiInterface;



/**
 * The CustomUserApi class.
 */
class CustomUserApi extends UserApi implements CustomUserApiInterface
{


    /**
     * Builds the CustomUserApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
