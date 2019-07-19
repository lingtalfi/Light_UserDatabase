Light_UserDatabase
===========
2019-07-19



An user database service to use in your [Light](https://github.com/lingtalfi/Light) applications.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserDatabase
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))





Services
=========


This plugin provides the following services:

- user_database


Any data related to an user can be stored in the database, although the primary intent
of this service was just to store the user rights. 




Here is an example of the service configuration file using a database stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files:

```yaml
user_database:
    instance: Ling\Light_UserDatabase\BabyYamlLightUserDatabase
    methods:
        setFile:
            file: ${app_dir}/config/user_database/database.byml


```







History Log
=============

- 1.0.0 -- 2019-07-19

    - initial commit