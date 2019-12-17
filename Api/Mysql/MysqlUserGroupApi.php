<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\UserGroupApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;



/**
 * The MysqlUserGroupApi class.
 */
class MysqlUserGroupApi implements UserGroupApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;



    /**
     * Builds the UserGroupApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;

    }




    /**
     * @implementation
     */
    public function insertUserGroup(array $userGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        return $this->doInsertUserGroup($userGroup, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getUserGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->doGetUserGroupById($id, $default, $throwNotFoundEx);
    }


    /**
     * @implementation
     */
    public function getUserGroupByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->doGetUserGroupByName($name, $default, $throwNotFoundEx);
    }




    /**
     * @implementation
     */
    public function getAllIds(): array
    {
        return $this->pdoWrapper->fetchAll("select id from `lud_user_group`", [], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function updateUserGroupById(int $id, array $userGroup)
    {
        $this->doUpdateUserGroupById($id, $userGroup);
    }

    /**
     * @implementation
     */
    public function updateUserGroupByName(string $name, array $userGroup)
    {
        $this->doUpdateUserGroupByName($name, $userGroup);
    }



    /**
     * @implementation
     */
    public function deleteUserGroupById(int $id)
    {
        $this->doDeleteUserGroupById($id);
    }

    /**
     * @implementation
     */
    public function deleteUserGroupByName(string $name)
    {
        $this->doDeleteUserGroupByName($name);
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
     * The working horse behind the insertUserGroup method.
     * See the insertUserGroup method for more details.
     *
     * @param array $userGroup
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertUserGroup(array $userGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_user_group", $userGroup);
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

                $query = "select id from `lud_user_group`";
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
     * The working horse behind the getUserGroupById method.
     * See the getUserGroupById method for more details.
     *
     * @param int $id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetUserGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_user_group` where id=:id", [
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
     * The working horse behind the getUserGroupByName method.
     * See the getUserGroupByName method for more details.
     *
     * @param string $name
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetUserGroupByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_user_group` where name=:name", [
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
     * The working horse behind the updateUserGroupById method.
     * See the updateUserGroupById method for more details.
     *
     * @param int $id
     * @param array $userGroup
     * @throws \Exception
     * @return void
     */
    protected function doUpdateUserGroupById(int $id, array $userGroup)
    {
        $this->pdoWrapper->update("lud_user_group", $userGroup, [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the updateUserGroupByName method.
     * See the updateUserGroupByName method for more details.
     *
     * @param string $name
     * @param array $userGroup
     * @throws \Exception
     * @return void
     */
    protected function doUpdateUserGroupByName(string $name, array $userGroup)
    {
        $this->pdoWrapper->update("lud_user_group", $userGroup, [
            "name" => $name,

        ]);
    }



    /**
     * The working horse behind the deleteUserGroupById method.
     * See the deleteUserGroupById method for more details.
     *
     * @param int $id
     * @throws \Exception
     * @return void
     */
    protected function doDeleteUserGroupById(int $id)
    {
        $this->pdoWrapper->delete("lud_user_group", [
            "id" => $id,

        ]);
    }

    /**
     * The working horse behind the deleteUserGroupByName method.
     * See the deleteUserGroupByName method for more details.
     *
     * @param string $name
     * @throws \Exception
     * @return void
     */
    protected function doDeleteUserGroupByName(string $name)
    {
        $this->pdoWrapper->delete("lud_user_group", [
            "name" => $name,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------


}
