<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;


use Ling\Light_UserDatabase\Api\PermissionOptionsApiInterface;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The BabyYamlPermissionOptionsApi class.
 */
class BabyYamlPermissionOptionsApi extends BabyYamlBaseApi implements PermissionOptionsApiInterface
{

    /**
     * @implementation
     */
    public function insertPermissionOptions(array $permissionOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function getPermissionOptionsById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function updatePermissionOptionsById(int $id, array $permissionOptions)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function deletePermissionOptionsById(int $id)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }


}