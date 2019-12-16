<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\UserOptionsApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;



/**
 * The MysqlUserOptionsApi class.
 */
class MysqlUserOptionsApi implements UserOptionsApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;



    /**
     * Builds the UserOptionsApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
		
    }




    /**
     * @implementation
     */
    public function insertUserOptions(array $userOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
        return $this->doInsertUserOptions($userOptions, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getUserOptionsById(int $id, $default = null, bool $throwNotFoundEx = false)
    { 
        return $this->doGetUserOptionsById($id, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function updateUserOptionsById(int $id, array $userOptions)
    { 
        $this->doUpdateUserOptionsById($id, $userOptions);
    }



    /**
     * @implementation
     */
    public function deleteUserOptionsById(int $id)
    { 
        $this->doDeleteUserOptionsById($id);
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
     * The working horse behind the insertUserOptions method.
     * See the insertUserOptions method for more details.
     *
     * @param array $userOptions
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertUserOptions(array $userOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_user_options", $userOptions);
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

                $query = "select id from `lud_user_options`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $userOptions);
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
     * The working horse behind the getUserOptionsById method.
     * See the getUserOptionsById method for more details.
     *
     * @param int $id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetUserOptionsById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_user_options` where id=:id", [
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
     * The working horse behind the updateUserOptionsById method.
     * See the updateUserOptionsById method for more details.
     *
     * @param int $id
     * @param array $userOptions
     * @throws \Exception
     * @return void
     */
    protected function doUpdateUserOptionsById(int $id, array $userOptions)
    {
        $this->pdoWrapper->update("lud_user_options", $userOptions, [
            "id" => $id,

        ]);
    }



    /**
     * The working horse behind the deleteUserOptionsById method.
     * See the deleteUserOptionsById method for more details.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    protected function doDeleteUserOptionsById(int $id)
    {
        $this->pdoWrapper->delete("lud_user_options", [
            "id" => $id,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------


}
