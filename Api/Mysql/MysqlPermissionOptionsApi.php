<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PermissionOptionsApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;



/**
 * The MysqlPermissionOptionsApi class.
 */
class MysqlPermissionOptionsApi implements PermissionOptionsApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;



    /**
     * Builds the PermissionOptionsApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
		
    }




    /**
     * @implementation
     */
    public function insertPermissionOptions(array $permissionOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
        return $this->doInsertPermissionOptions($permissionOptions, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getPermissionOptionsById(int $id, $default = null, bool $throwNotFoundEx = false)
    { 
        return $this->doGetPermissionOptionsById($id, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function updatePermissionOptionsById(int $id, array $permissionOptions)
    { 
        $this->doUpdatePermissionOptionsById($id, $permissionOptions);
    }



    /**
     * @implementation
     */
    public function deletePermissionOptionsById(int $id)
    { 
        $this->doDeletePermissionOptionsById($id);
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
     * The working horse behind the insertPermissionOptions method.
     * See the insertPermissionOptions method for more details.
     *
     * @param array $permissionOptions
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertPermissionOptions(array $permissionOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_permission_options", $permissionOptions);
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

                $query = "select id from `lud_permission_options`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $permissionOptions);
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
     * The working horse behind the getPermissionOptionsById method.
     * See the getPermissionOptionsById method for more details.
     *
     * @param int $id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetPermissionOptionsById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_permission_options` where id=:id", [
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
     * The working horse behind the updatePermissionOptionsById method.
     * See the updatePermissionOptionsById method for more details.
     *
     * @param int $id
     * @param array $permissionOptions
     * @throws \Exception
     * @return void
     */
    protected function doUpdatePermissionOptionsById(int $id, array $permissionOptions)
    {
        $this->pdoWrapper->update("lud_permission_options", $permissionOptions, [
            "id" => $id,

        ]);
    }



    /**
     * The working horse behind the deletePermissionOptionsById method.
     * See the deletePermissionOptionsById method for more details.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    protected function doDeletePermissionOptionsById(int $id)
    {
        $this->pdoWrapper->delete("lud_permission_options", [
            "id" => $id,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------


}
