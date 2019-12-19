<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PluginOptionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;


/**
 * The MysqlPluginOptionApi class.
 */
class MysqlPluginOptionApi extends MysqlBaseLightUserDatabaseApi implements PluginOptionApiInterface
{

    /**
     * Builds the MysqlPluginOptionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_plugin_option";
    }


    /**
     * @implementation
     */
    public function insertPluginOption(array $pluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $pluginOption);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $pluginOption);
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
    public function getPluginOptionById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getPluginOptionByName(string $name, $default = null, bool $throwNotFoundEx = false)
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
    public function updatePluginOptionById(int $id, array $pluginOption)
    {
        $this->pdoWrapper->update($this->table, $pluginOption, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updatePluginOptionByName(string $name, array $pluginOption)
    {
        $this->pdoWrapper->update($this->table, $pluginOption, [
            "name" => $name,

        ]);
    }


    /**
     * @implementation
     */
    public function deletePluginOptionById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePluginOptionByName(string $name)
    {
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }


}
