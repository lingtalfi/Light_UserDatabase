Schema conception notes
===========
2019-12-13 -> 2020-01-31





- **lud_user**: it represents the light user.
    
    - id: aik
    - user_group: fk
    - identifier: uq, str 128. The user identifier. It must be a valid filename as defined by the FileSystemTool::isValidFilename method.
    
        This is important because it might be relied upon by third-party plugins, such as the [Light_UserData](https://github.com/lingtalfi/Light_UserData) plugin.
    - pseudo: str 64
    - password: str 64
    - avatar_url: str 512
    - extra: txt. An array of extra parameters. 
        Third-party plugins can use this to help implement their logic at the user level.
        Generally though, we recommend implement user features at the group level (see the lud_plugin_option and lud_user_group tables).

        
- **lud_permission_group**: the permission group is a container for permissions. See the [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/personal/mydoc/pages/permission-conception-notes.md) for more details.
    - id: aik    
    - name: uq, str 128    
    

- **lud_user_has_permission_group**: simple linkage table
    - user_id: fk    
    - permission_group_id: fk
    

- **lud_permission**: represents a permission. See the [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/personal/mydoc/pages/permission-conception-notes.md) for more details.
    - id: aik    
    - name: uq, str 128    


- **lud_permission_group_has_permission**: simple linkage table
    - permission_group_id: fk
    - permission_id: fk


- **lud_user_group**: container for users. The idea is that third-party plugins can add plugin options (via the **lud_plugin_option** table), and bind them to a whole user group at once.
    - id: aik    
    - name: uq, str 64
    
    
- **lud_plugin_option**: the plugin options. Third-party plugins can use this table to add their own (user related) options.
    - id: aik    
    - plugin: str 128. The name of the plugin registering this option.    
    - name: uq, str 128. The name of the option. We recommend the following naming convention:
        - optionName: $pluginName.$pluginOptionName
        
            With:
            - $pluginName: the name of the plugin 
            - $pluginOptionName: the name of option inside the plugin context
    - value: str 512. The value of the option.             
    - description: txt             