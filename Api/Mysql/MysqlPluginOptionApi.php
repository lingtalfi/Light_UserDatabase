<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PluginOptionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;


/**
 * The MysqlPluginOptionApi class.
 */
class MysqlPluginOptionApi implements PluginOptionApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;



    /**
     * Builds the PluginOptionApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;

    }




    /**
     * @implementation
     */
    public function insertPluginOption(array $pluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        return $this->doInsertPluginOption($pluginOption, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getPluginOptionById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->doGetPluginOptionById($id, $default, $throwNotFoundEx);
    }


    /**
     * @implementation
     */
    public function getPluginOptionByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->doGetPluginOptionByName($name, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function getAllIds(): array
    {
        return $this->pdoWrapper->fetchAll("select id from `lud_plugin_option`", [], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function updatePluginOptionById(int $id, array $pluginOption)
    {
        $this->doUpdatePluginOptionById($id, $pluginOption);
    }

    /**
     * @implementation
     */
    public function updatePluginOptionByName(string $name, array $pluginOption)
    {
        $this->doUpdatePluginOptionByName($name, $pluginOption);
    }



    /**
     * @implementation
     */
    public function deletePluginOptionById(int $id)
    {
        $this->doDeletePluginOptionById($id);
    }

    /**
     * @implementation
     */
    public function deletePluginOptionByName(string $name)
    {
        $this->doDeletePluginOptionByName($name);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * The working horse behind the insertPluginOption method.
     * See the insertPluginOption method for more details.
     *
     * @param array $pluginOption
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertPluginOption(array $pluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_plugin_option", $pluginOption);
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

                $query = "select id from `lud_plugin_option`";
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
     * The working horse behind the getPluginOptionById method.
     * See the getPluginOptionById method for more details.
     *
     * @param int $id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetPluginOptionById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_plugin_option` where id=:id", [
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
     * The working horse behind the getPluginOptionByName method.
     * See the getPluginOptionByName method for more details.
     *
     * @param string $name
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetPluginOptionByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_plugin_option` where name=:name", [
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
     * The working horse behind the updatePluginOptionById method.
     * See the updatePluginOptionById method for more details.
     *
     * @param int $id
     * @param array $pluginOption
     * @throws \Exception
     * @return void
     */
    protected function doUpdatePluginOptionById(int $id, array $pluginOption)
    {
        $this->pdoWrapper->update("lud_plugin_option", $pluginOption, [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the updatePluginOptionByName method.
     * See the updatePluginOptionByName method for more details.
     *
     * @param string $name
     * @param array $pluginOption
     * @throws \Exception
     * @return void
     */
    protected function doUpdatePluginOptionByName(string $name, array $pluginOption)
    {
        $this->pdoWrapper->update("lud_plugin_option", $pluginOption, [
            "name" => $name,

        ]);
    }



    /**
     * The working horse behind the deletePluginOptionById method.
     * See the deletePluginOptionById method for more details.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    protected function doDeletePluginOptionById(int $id)
    {
        $this->pdoWrapper->delete("lud_plugin_option", [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the deletePluginOptionByName method.
     * See the deletePluginOptionByName method for more details.
     *
     * @param string $name
     * @throws \Exception
     * @return void
     */
    protected function doDeletePluginOptionByName(string $name)
    {
        $this->pdoWrapper->delete("lud_plugin_option", [
            "name" => $name,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------


}
