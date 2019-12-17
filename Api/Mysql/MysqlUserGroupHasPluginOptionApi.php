<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\UserGroupHasPluginOptionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;



/**
 * The MysqlUserGroupHasPluginOptionApi class.
 */
class MysqlUserGroupHasPluginOptionApi implements UserGroupHasPluginOptionApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;



    /**
     * Builds the UserGroupHasPluginOptionApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;

    }




    /**
     * @implementation
     */
    public function insertUserGroupHasPluginOption(array $userGroupHasPluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        return $this->doInsertUserGroupHasPluginOption($userGroupHasPluginOption, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->doGetUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId($user_group_id, $plugin_option_id, $default, $throwNotFoundEx);
    }






    /**
     * @implementation
     */
    public function updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption)
    {
        $this->doUpdateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId($user_group_id, $plugin_option_id, $userGroupHasPluginOption);
    }



    /**
     * @implementation
     */
    public function deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id)
    {
        $this->doDeleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId($user_group_id, $plugin_option_id);
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
     * The working horse behind the insertUserGroupHasPluginOption method.
     * See the insertUserGroupHasPluginOption method for more details.
     *
     * @param array $userGroupHasPluginOption
     * @param bool=true $ignoreDuplicate
     * @param bool=false $returnRic
     * @return mixed
     * @throws \Exception
     */
    protected function doInsertUserGroupHasPluginOption(array $userGroupHasPluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_user_group_has_plugin_option", $userGroupHasPluginOption);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'user_group_id' => $userGroupHasPluginOption["user_group_id"],
                'plugin_option_id' => $userGroupHasPluginOption["plugin_option_id"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select user_group_id, plugin_option_id from `lud_user_group_has_plugin_option`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $userGroupHasPluginOption);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'user_group_id' => $res["user_group_id"],
                    'plugin_option_id' => $res["plugin_option_id"],

                ];
            }
        }
        return false;
    }

    /**
     * The working horse behind the getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId method.
     * See the getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId method for more details.
     *
     * @param int $user_group_id
     * @param int $plugin_option_id
     * @param mixed=null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    protected function doGetUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `lud_user_group_has_plugin_option` where user_group_id=:user_group_id and plugin_option_id=:plugin_option_id", [
            "user_group_id" => $user_group_id,
            "plugin_option_id" => $plugin_option_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with user_group_id=$user_group_id, plugin_option_id=$plugin_option_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * The working horse behind the updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId method.
     * See the updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId method for more details.
     *
     * @param int $user_group_id
     * @param int $plugin_option_id
     * @param array $userGroupHasPluginOption
     * @throws \Exception
     * @return void
     */
    protected function doUpdateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption)
    {
        $this->pdoWrapper->update("lud_user_group_has_plugin_option", $user, [
            "user_group_id" => $user_group_id,
            "plugin_option_id" => $plugin_option_id,

        ]);
    }



    /**
     * The working horse behind the deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId method.
     * See the deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId method for more details.
     *
     * @param int $user_group_id
     * @param int $plugin_option_id
     * @throws \Exception
     * @return void
     */
    protected function doDeleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id)
    {
        $this->pdoWrapper->delete("lud_user_group_has_plugin_option", [
            "user_group_id" => $user_group_id,
            "plugin_option_id" => $plugin_option_id,

        ]);
    }




    //--------------------------------------------
    //
    //--------------------------------------------


}
