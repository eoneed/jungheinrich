<?php
namespace Ism;

/**
 *
 */
use \Symfony\Component\Yaml\Yaml;

/**

 */
class Config
{

    /**
     * @var \Ism\Config
     */
    private static $Instance = null;

    /**
     * Retrieves the Config Instance.
     *
     * @return \Ism\Config
     */
    public static function getInstance() {

        if (self::$Instance === null) {
            self::$Instance = new static();
        }
        return self::$Instance;
    }

    /**
     * @return \Ism\Storage\SQLite
     */
    public function getStorage() {
        return new Storage\SQLite();
    }

    /**
     * @return \Ism\Queue\Redis
     */
    public function getQueue() {
        return new Queue\Redis();
    }
}
