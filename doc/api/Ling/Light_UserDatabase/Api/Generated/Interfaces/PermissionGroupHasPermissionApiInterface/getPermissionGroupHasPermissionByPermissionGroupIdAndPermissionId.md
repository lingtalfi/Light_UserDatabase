[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupHasPermissionApiInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.md)


PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId
================



PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId — Returns the permission group has permission row identified by the given permission_group_id and permission_id.




Description
================


abstract public [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId.md)(int $permission_group_id, int $permission_id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the permission group has permission row identified by the given permission_group_id and permission_id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- permission_group_id

    

- permission_id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PermissionGroupHasPermissionApiInterface::getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.php#L96-L96)


See Also
================

The [PermissionGroupHasPermissionApiInterface](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/fetch.md)<br>Next method: [getPermissionGroupHasPermission](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Api/Generated/Interfaces/PermissionGroupHasPermissionApiInterface/getPermissionGroupHasPermission.md)<br>

