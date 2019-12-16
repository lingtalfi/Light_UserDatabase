<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;

use Ling\Light_UserDatabase\Api\UserHasPermissionGroupApiInterface;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The BabyYamlUserHasPermissionGroupApi class.
 */
class BabyYamlUserHasPermissionGroupApi extends BabyYamlBaseApi implements UserHasPermissionGroupApiInterface
{
    /**
     * @implementation
     */
    public function getUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, $default = null, bool $throwNotFoundEx = false)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id)
    {
        throw new LightUserDatabaseException("Not implemented yet, use the sql implementation instead.");
    }

}