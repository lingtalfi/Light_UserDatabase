<?php


namespace Ling\Light_UserDatabase\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_UserDatabase\Api\Custom\CustomLightUserDatabaseApiFactory;
use Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase;

/**
 * The LightUserDatabaseService class.
 *
 * Note: we extend the mysql version and not the babyYaml version which was just
 * used only by me when starting up this project.
 *
 */
class LightUserDatabaseService extends MysqlLightWebsiteUserDatabase
{

    /**
     * This property holds the factory for this instance.
     * @var CustomLightUserDatabaseApiFactory
     */
    private $factory;


    /**
     * Builds the LightUserDatabaseService instance.
     */
    public function __construct()
    {
        $this->factory = null;
        parent::__construct();
    }


    /**
     * @overrides
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
        /**
         * @var $databaseService LightDatabaseService
         */
        $databaseService = $container->get("database");
        $this->pdoWrapper = $databaseService;

    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightUserDatabaseApiFactory
     */
    public function getFactory(): CustomLightUserDatabaseApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightUserDatabaseApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->pdoWrapper);
        }
        return $this->factory;
    }
}