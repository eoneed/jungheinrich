<?php
namespace Ism\Storage;

/**
 *
 */
class SQLite {

    protected $sqlite;

    /**
     *
     */
    public function __construct($props = [])
    {
        $this->sqlite = new \SQLite3(
            APP_ROOT.'/var/storage.db'
        );
        $this->sqlite->exec('
            CREATE TABLE
            IF NOT EXISTS ism_ride (
                id  INTEGER PRIMARY KEY,
                driver STRING,
                vehicle STRING,
                started STRING,
                finished STRING
            );
        ');
    }

    /**
     * @var \Ism\Entity\Ride
     */
    public function addRide($ride)
    {
        $insert = $this->sqlite->exec("
            INSERT
              INTO ism_ride (
                    id, driver, vehicle, started, finished
                )
            VALUES (
                    null,
                    '".$ride->getDriver()->getId()."',
                    '".$ride->getVehicle()->getId()."',
                    '".$ride->getStarted()."',
                    '".$ride->getFinished()."'
                )
        ");
        $ride->setId($this->sqlite->lastInsertRowId());
    }

    /**
     *
     */
    public function getRides()
    {
        $select = $this->sqlite->query("
            SELECT id, driver, vehicle, started, finished FROM ism_ride
        ");

        $return = [];
        while($row = $select->fetchArray(SQLITE3_ASSOC)) {
            $return[] = $row;
        }
        return $return;
    }

}
