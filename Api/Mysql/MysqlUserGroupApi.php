<?php


namespace Ling\Light_UserDatabase\Api\Mysql;

use Ling\Light_UserDatabase\Api\UserGroupApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;


/**
 * The MysqlUserGroupApi class.
 */
class MysqlUserGroupApi extends MysqlBaseLightUserDatabaseApi implements UserGroupApiInterface
{


    /**
     * Builds the MysqlUserGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_user_group";
    }


    /**
     * @implementation
     */
    public function insertUserGroup(array $userGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $userGroup);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $userGroup);
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
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getUserGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getUserGroupByName(string $name, $default = null, bool $throwNotFoundEx = false)
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
    public function updateUserGroupById(int $id, array $userGroup)
    {
        $this->pdoWrapper->update($this->table, $userGroup, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updateUserGroupByName(string $name, array $userGroup)
    {
        $this->pdoWrapper->update($this->table, $userGroup, [
            "name" => $name,

        ]);
    }


    /**
     * @implementation
     */
    public function deleteUserGroupById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserGroupByName(string $name)
    {
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }


    //--------------------------------------------
    // CUSTOM METHODS
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getUserGroupIdByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `lud_user_group` where name=:name", [
            "name" => $name,

        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

}
