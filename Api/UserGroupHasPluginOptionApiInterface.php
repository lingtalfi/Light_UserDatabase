<?php


namespace Ling\Light_UserDatabase\Api;


/**
 * The UserGroupHasPluginOptionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserGroupHasPluginOptionApiInterface
{

    /**
     * Inserts the given userGroupHasPluginOption in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $userGroupHasPluginOption
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserGroupHasPluginOption(array $userGroupHasPluginOption, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $user_group_id
     * @param int $plugin_option_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, $default = null, bool $throwNotFoundEx = false);






    /**
     * Updates the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
     *
     * @param int $user_group_id
     * @param int $plugin_option_id
     * @param array $userGroupHasPluginOption
     * @return void
     * @throws \Exception
     */
    public function updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption);



    /**
     * Deletes the userGroupHasPluginOption identified by the given user_group_id and plugin_option_id.
     *
     * @param int $user_group_id
     * @param int $plugin_option_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id);



}
