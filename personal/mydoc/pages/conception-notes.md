Light_UserDatabase, conception notes
===================
2019-09-16



So, this service provides an interface to a [light user](https://github.com/lingtalfi/Light_User).


In particular, we provide an interface for the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md), which is a special type of light user more suitable
for web applications.



Our implementation has some peculiarities though, and so I want to discuss them, so that the developer can get
a better understanding of what's going on with this planet.



First, we see the user as a database structure with the following tables:


- user
- permission
- permission_group
- user_has_permission_group
- permission_group_has_permission
- user_options
- permission_options


The semantics of those table names takes its roots in the [Light_User permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md),
which we implement.

In our mysql implementation, all tables have cascading for DELETE and UPDATE,
and our tables are prefixed with the "lud_" prefix (i.e. lud_user, lud_permission, ...).


Our implementation offers two database types:

- either a babyYaml based database (BabyYamlLightWebsiteUserDatabase)
- or a regular mysql database (MysqlLightWebsiteUserDatabase)


Usually, we recommend to stick with the mysql implementation, as mysql has natural foreign key constraint checking,
whereas our babyYaml implementation doesn't provide such functionality.

The babyYaml implementation was an early implementation that I personally used in the early stages of the development
of this planet, when there was only one "user" table, and I needed a quick tool to interact with it.
So, again, now that the mysql implementation is done, we recommend to use the mysql implementation only, which is more suitable for
storing larger/real life data.



So now what's peculiar to our implementation of the Light WebsiteUser is that the methods related to the 
user table (i.e. getUser, insertUser, ...) are directly available in the object (MysqlLightWebsiteUserDatabase), whereas the interaction
with the other tables (i.e. permission, permission_group, ...) is accessed via apis.

So for instance, in order to insert a permission, you need to use access the permission api first, like this:

```php
/**
 * @var $db LightWebsiteUserDatabaseInterface
 */
$db = $container->get('user_database');
az($db->getPermissionApi()->insertPermission([
    "MyPlugin.myPermission",
]));
```

More details in the @page(LightWebsiteUserDatabaseInterface class).


Note: we used the [Light_BreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator) plugin to generate the bulk of our apis.


 


The getUserInfoByCredentials method
--------------

The **getUserInfoByCredentials** method is a key moment in the website user's lifetime.

In fact, the **getUserInfoByCredentials** is called just before the website user is instantiated in the php session.

In our implementation, we believe that the permissions of the user should be stored in the session (to avoid database requests
everytime we need to check whether the user has a certain permission), and therefore
our **getUserInfoByCredentials** method returns an extended user array, which is like the regular user info array,
but with the extra "rights" property, which contains all the permissions of the given user.



The root user
-----------
2019-12-16


The creation of the root user is done at the **LightWebsiteUserDatabaseInterface** level, at the same moment
when the "tables" are created.
The **root** user belongs to the special (permission) group named "root" (it's a reserved permission group name),
which contains only one permission named "*" (also reserved), which grants any right/permission to the users who owns it.




The user_options and permission_options tables
-----------------
2019-12-16


The two tables **user_options** and **permission_options** are in the process of being added today.

The goal with this tables is that plugins can attach some additional information to an user or a permission,
and even provide a gui interface to interact with it.

This is for instance used by the **Light_UserData** plugin (implementation in progress as I write those lines),
which stores the maximum allowed storage capacity in bytes based on the user permission. So for instance the user with permission
**Light_UserData_Class1** has a maximum storage capacity of 20M, then the user with permission **Light_UserData_Class2** has 50M, etc... 



Binding information to the user
-----------
2019-12-16

Our plugin basically provides you with two ways of binding data to the user:

- using the **user_options** and/or **permission_options** tables
- adding information to the extra field of the user table 


We generally use the first method to store data that we intend to retrieve by the mean of a database request.
But sometimes, we want the data to be accessible directly from the session, to avoid that database request (which can
be considered slow). And so when this is the case, we tend to store that kind of hot data directly in the extra field of the **user** table,
which then should be accessible from the session.  


In order to add data in the **user_options** and **permission_options** tables, we rely on the events provided by 
the [Light_Database plugin](https://github.com/lingtalfi/Light_Database):

- **Light_Database.on_lud_user_options_create** 
- **Light_Database.on_lud_permission_options_create**

See the [Light_Database events page](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md) for more details. 

Now to store the data in the extra field of the **user** table, we use an event of ours:

- Light_UserDatabase.on_new_user_before

See more about this events in [our events page](https://github.com/lingtalfi/Light_UserDatabase/blob/master/personal/mydoc/pages/events.md).

