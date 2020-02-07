<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Custom;


use Ling\Light_UserDatabase\Api\Mysql\Classes\PluginOptionApi;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The CustomPluginOptionApi class.
 */
class CustomPluginOptionApi extends PluginOptionApi
{

    /**
     * @implementation
     */
    public function deletePluginOptionsByPluginName(string $pluginName)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("category")->startsWith($pluginName . "."));
    }


}