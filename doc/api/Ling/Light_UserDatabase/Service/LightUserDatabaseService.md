[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)



The LightUserDatabaseService class
================
2019-07-19 --> 2020-06-08






Introduction
============

The LightUserDatabaseService class.

Note: we extend the mysql version and not the babyYaml version which was just
used only by me when starting up this project.



Class synopsis
==============


class <span class="pl-k">LightUserDatabaseService</span> extends [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md) implements [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md), [LightUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightUserDatabaseInterface.md), [LightWebsiteUserDatabaseInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md) {

- Properties
    - private [Ling\Light_UserDatabase\Api\Custom\CustomLightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory.md) [$factory](#property-factory) ;

- Inherited properties
    - protected string|null [MysqlLightWebsiteUserDatabase::$database](#property-database) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_identifier](#property-root_identifier) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_password](#property-root_password) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_pseudo](#property-root_pseudo) ;
    - protected string [MysqlLightWebsiteUserDatabase::$root_avatar_url](#property-root_avatar_url) ;
    - protected array [MysqlLightWebsiteUserDatabase::$root_extra](#property-root_extra) ;
    - protected [Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md)|null [MysqlLightWebsiteUserDatabase::$passwordProtector](#property-passwordProtector) ;
    - protected [Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) [LightUserDatabaseApiFactory::$pdoWrapper](#property-pdoWrapper) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightUserDatabaseApiFactory::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [getFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/getFactory.md)() : [CustomLightUserDatabaseApiFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/CustomLightUserDatabaseApiFactory.md)

- Inherited methods
    - public [MysqlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByCredentials.md)(string $identifier, string $password) : array | false
    - public [MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false
    - public [MysqlLightWebsiteUserDatabase::getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoById.md)(int $id) : array | false
    - public [MysqlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/addUser.md)(array $userInfo) : mixed
    - public [MysqlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUser.md)(string $identifier, array $userInfo) : void
    - public [MysqlLightWebsiteUserDatabase::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUserById.md)(int $id, array $userInfo) : void
    - public [MysqlLightWebsiteUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUser.md)(string $identifier) : void
    - public [MysqlLightWebsiteUserDatabase::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUserById.md)(int $id) : void
    - public [MysqlLightWebsiteUserDatabase::getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserInfo.md)() : array
    - public [MysqlLightWebsiteUserDatabase::getAllUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserIds.md)() : array
    - public [MysqlLightWebsiteUserDatabase::install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/install.md)() : void
    - public [MysqlLightWebsiteUserDatabase::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/uninstall.md)() : void
    - public [MysqlLightWebsiteUserDatabase::getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getDependencies.md)() : array
    - public [MysqlLightWebsiteUserDatabase::setDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setDatabase.md)(string $database) : void
    - public [MysqlLightWebsiteUserDatabase::setTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setTable.md)(string $table) : void
    - public [MysqlLightWebsiteUserDatabase::setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootIdentifier.md)(string $root_identifier) : void
    - public [MysqlLightWebsiteUserDatabase::setRootPassword](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPassword.md)(string $root_password) : void
    - public [MysqlLightWebsiteUserDatabase::setRootPseudo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPseudo.md)(string $root_pseudo) : void
    - public [MysqlLightWebsiteUserDatabase::setRootAvatarUrl](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootAvatarUrl.md)(string $root_avatar_url) : void
    - public [MysqlLightWebsiteUserDatabase::setRootExtra](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootExtra.md)(array $root_extra) : void
    - public [MysqlLightWebsiteUserDatabase::setPasswordProtector](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setPasswordProtector.md)([Ling\Light_PasswordProtector\Service\LightPasswordProtector](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector/Service/LightPasswordProtector.md) $passwordProtector) : void
    - public [MysqlLightWebsiteUserDatabase::getTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getTable.md)() : string
    - protected [MysqlLightWebsiteUserDatabase::dQuoteTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/dQuoteTable.md)(string $table) : string
    - protected [MysqlLightWebsiteUserDatabase::unserialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/unserialize.md)(array &$array) : void
    - protected [MysqlLightWebsiteUserDatabase::serialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/serialize.md)(array &$array) : void
    - public [LightUserDatabaseApiFactory::getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupApi.md)() : [CustomUserGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupApiInterface.md)
    - public [LightUserDatabaseApiFactory::getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserApi.md)() : [CustomUserApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupApi.md)() : [CustomPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionApi.md)() : [CustomPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionApiInterface.md)
    - public [LightUserDatabaseApiFactory::getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md)() : [CustomUserHasPermissionGroupApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserHasPermissionGroupApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md)() : [CustomPermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPermissionGroupHasPermissionApiInterface.md)
    - public [LightUserDatabaseApiFactory::getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPluginOptionApi.md)() : [CustomPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomPluginOptionApiInterface.md)
    - public [LightUserDatabaseApiFactory::getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md)() : [CustomUserGroupHasPluginOptionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Custom/Interfaces/CustomUserGroupHasPluginOptionApiInterface.md)
    - public [LightUserDatabaseApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setPdoWrapper.md)([Ling\SimplePdoWrapper\SimplePdoWrapperInterface](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/SimplePdoWrapperInterface.md) $pdoWrapper) : void

}




Properties
=============

- <span id="property-factory"><b>factory</b></span>

    This property holds the factory for this instance.
    
    

- <span id="property-database"><b>database</b></span>

    This property holds the database for this instance.
    If null, this class will try to use the default database.
    
    

- <span id="property-root_identifier"><b>root_identifier</b></span>

    This property holds the identifier for the default root user.
    
    

- <span id="property-root_password"><b>root_password</b></span>

    This property holds the password for the default root user.
    
    

- <span id="property-root_pseudo"><b>root_pseudo</b></span>

    This property holds the pseudo for the default root user.
    
    

- <span id="property-root_avatar_url"><b>root_avatar_url</b></span>

    This property holds the avatar_url for the default root user.
    
    

- <span id="property-root_extra"><b>root_extra</b></span>

    This property holds the extra array for the default root user.
    
    

- <span id="property-passwordProtector"><b>passwordProtector</b></span>

    This property holds the [passwordProtector](https://github.com/lingtalfi/Light_PasswordProtector/) for this instance.
    If set, the password will automatically be hashed when necessary, which concerns the following methods:
    - getUserInfoByCredentials
    - addUser
    - updateUser
    - updateUserById
    
    

- <span id="property-pdoWrapper"><b>pdoWrapper</b></span>

    This property holds the pdoWrapper for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightUserDatabaseService::__construct](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/__construct.md) &ndash; Builds the LightUserDatabaseService instance.
- [LightUserDatabaseService::setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/setContainer.md) &ndash; Sets the container.
- [LightUserDatabaseService::getFactory](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/getFactory.md) &ndash; Returns the factory for this plugin's api.
- [MysqlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByCredentials.md) &ndash; credentials don't match any user.
- [MysqlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoByIdentifier.md) &ndash; doesn't match an user.
- [MysqlLightWebsiteUserDatabase::getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getUserInfoById.md) &ndash; doesn't match an user.
- [MysqlLightWebsiteUserDatabase::addUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/addUser.md) &ndash; Adds the user info to the database.
- [MysqlLightWebsiteUserDatabase::updateUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUser.md) &ndash; Updates the user identified by the given identifier.
- [MysqlLightWebsiteUserDatabase::updateUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/updateUserById.md) &ndash; Updates the user identified by the given id.
- [MysqlLightWebsiteUserDatabase::deleteUser](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUser.md) &ndash; Deletes the user identified by the given identifier.
- [MysqlLightWebsiteUserDatabase::deleteUserById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/deleteUserById.md) &ndash; Deletes the user identified by the given id.
- [MysqlLightWebsiteUserDatabase::getAllUserInfo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserInfo.md) &ndash; Returns an array of user info (one per user).
- [MysqlLightWebsiteUserDatabase::getAllUserIds](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getAllUserIds.md) &ndash; Returns an array of all user ids.
- [MysqlLightWebsiteUserDatabase::install](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/install.md) &ndash; Installs the plugin in the light application.
- [MysqlLightWebsiteUserDatabase::uninstall](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/uninstall.md) &ndash; Uninstalls the plugin.
- [MysqlLightWebsiteUserDatabase::getDependencies](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getDependencies.md) &ndash; Returns the array of dependencies.
- [MysqlLightWebsiteUserDatabase::setDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setDatabase.md) &ndash; Sets the database.
- [MysqlLightWebsiteUserDatabase::setTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setTable.md) &ndash; Sets the table.
- [MysqlLightWebsiteUserDatabase::setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootIdentifier.md) &ndash; Sets the root_identifier.
- [MysqlLightWebsiteUserDatabase::setRootPassword](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPassword.md) &ndash; Sets the root_password.
- [MysqlLightWebsiteUserDatabase::setRootPseudo](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootPseudo.md) &ndash; Sets the root_pseudo.
- [MysqlLightWebsiteUserDatabase::setRootAvatarUrl](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootAvatarUrl.md) &ndash; Sets the root_avatar_url.
- [MysqlLightWebsiteUserDatabase::setRootExtra](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setRootExtra.md) &ndash; Sets the root_extra.
- [MysqlLightWebsiteUserDatabase::setPasswordProtector](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/setPasswordProtector.md) &ndash; Sets the passwordProtector.
- [MysqlLightWebsiteUserDatabase::getTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/getTable.md) &ndash; Returns the table name.
- [MysqlLightWebsiteUserDatabase::dQuoteTable](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/dQuoteTable.md) &ndash; Returns the double quote protected full version of the given table.
- [MysqlLightWebsiteUserDatabase::unserialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/unserialize.md) &ndash; Unserializes the relevant keys from the given array (i.e.
- [MysqlLightWebsiteUserDatabase::serialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase/serialize.md) &ndash; Serializes the relevant keys from the given array (i.e.
- [LightUserDatabaseApiFactory::getUserGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupApi.md) &ndash; Returns a CustomUserGroupApiInterface.
- [LightUserDatabaseApiFactory::getUserApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserApi.md) &ndash; Returns a CustomUserApiInterface.
- [LightUserDatabaseApiFactory::getPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupApi.md) &ndash; Returns a CustomPermissionGroupApiInterface.
- [LightUserDatabaseApiFactory::getPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionApi.md) &ndash; Returns a CustomPermissionApiInterface.
- [LightUserDatabaseApiFactory::getUserHasPermissionGroupApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserHasPermissionGroupApi.md) &ndash; Returns a CustomUserHasPermissionGroupApiInterface.
- [LightUserDatabaseApiFactory::getPermissionGroupHasPermissionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPermissionGroupHasPermissionApi.md) &ndash; Returns a CustomPermissionGroupHasPermissionApiInterface.
- [LightUserDatabaseApiFactory::getPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getPluginOptionApi.md) &ndash; Returns a CustomPluginOptionApiInterface.
- [LightUserDatabaseApiFactory::getUserGroupHasPluginOptionApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/getUserGroupHasPluginOptionApi.md) &ndash; Returns a CustomUserGroupHasPluginOptionApiInterface.
- [LightUserDatabaseApiFactory::setPdoWrapper](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/LightUserDatabaseApiFactory/setPdoWrapper.md) &ndash; Sets the pdoWrapper.





Location
=============
Ling\Light_UserDatabase\Service\LightUserDatabaseService<br>
See the source code of [Ling\Light_UserDatabase\Service\LightUserDatabaseService](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Service/LightUserDatabaseService.php)



SeeAlso
==============
Previous class: [MysqlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)<br>
