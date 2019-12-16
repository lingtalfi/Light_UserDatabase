<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;


use Ling\Light_UserDatabase\Api\UserOptionsApiInterface;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The BabyYamlUserOptionsApi class.
 */
class BabyYamlUserOptionsApi extends BabyYamlBaseApi implements UserOptionsApiInterface
{

    /**
     * @implementation
     */
    public function insertUserOptions(array $userOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function getUserOptionsById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function updateUserOptionsById(int $id, array $userOptions)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function deleteUserOptionsById(int $id)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }


}