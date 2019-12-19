<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;

/**
 * The MysqlPermissionGroupHasPermissionApi class.
 */
class MysqlPermissionGroupHasPermissionApi extends MysqlBaseLightUserDatabaseApi implements PermissionGroupHasPermissionApiInterface
{


    /**
     * Builds the MysqlPermissionGroupHasPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_permission_group_has_permission";
    }


    /**
     * @implementation
     */
    public function insertPermissionGroupHasPermission(array $permissionGroupHasPermission, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $permissionGroupHasPermission);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'permission_group_id' => $permissionGroupHasPermission["permission_group_id"],
                'permission_id' => $permissionGroupHasPermission["permission_id"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select permission_group_id, permission_id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $permissionGroupHasPermission);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'permission_group_id' => $res["permission_group_id"],
                    'permission_id' => $res["permission_id"],

                ];
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where permission_group_id=:permission_group_id and permission_id=:permission_id", [
            "permission_group_id" => $permission_group_id,
            "permission_id" => $permission_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with permission_group_id=$permission_group_id, permission_id=$permission_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission)
    {
        $this->pdoWrapper->update($this->table, $permissionGroupHasPermission, [
            "permission_group_id" => $permission_group_id,
            "permission_id" => $permission_id,

        ]);
    }


    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id)
    {
        $this->pdoWrapper->delete($this->table, [
            "permission_group_id" => $permission_group_id,
            "permission_id" => $permission_id,

        ]);
    }


}
