<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PermissionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;

/**
 * The MysqlPermissionApi class.
 */
class MysqlPermissionApi extends MysqlBaseLightUserDatabaseApi implements PermissionApiInterface
{


    /**
     * Builds the MysqlPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_permission";
    }


    /**
     * @implementation
     */
    public function insertPermission(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $permission);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $permission);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return $res['id'];
                }
                return [
                    'id' => $res["id"],

                ];
            }
            throw $e;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getPermissionById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where id=:id", [
            "id" => $id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with id=$id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function getPermissionByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where name=:name", [
            "name" => $name,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }


    /**
     * @implementation
     */
    public function getAllIds(): array
    {
        return $this->pdoWrapper->fetchAll("select id from `$this->table`", [], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function updatePermissionById(int $id, array $permission)
    {
        $this->pdoWrapper->update($this->table, $permission, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updatePermissionByName(string $name, array $permission)
    {
        $this->pdoWrapper->update($this->table, $permission, [
            "name" => $name,

        ]);
    }


    /**
     * @implementation
     */
    public function deletePermissionById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePermissionByName(string $name)
    {
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getPermissionNamesByUserId(int $id): array
    {
        $ret = $this->pdoWrapper->fetchAll("
        
        select p.name from lud_user u
        inner join lud_user_has_permission_group uhg on uhg.user_id=u.id
        inner join lud_permission_group_has_permission php on php.permission_group_id=uhg.permission_group_id
        inner join lud_permission p on p.id=php.permission_id
         where u.id=:id", [
            "id" => $id,
        ], \PDO::FETCH_COLUMN);
        return $ret;
    }


}
