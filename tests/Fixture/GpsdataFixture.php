<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GpsdataFixture
 *
 */
class GpsdataFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'imei' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'gpstime' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'msgdtime' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'latitude' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'longitude' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'speed' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'heading' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'altitude' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'distance' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'status' => ['type' => 'string', 'fixed' => true, 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'odometer' => ['type' => 'float', 'length' => null, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'digitalvalues' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'analogvalues' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'acceleration' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'deceleration' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'extstatus' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'trackingobject_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'device_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'location' => ['type' => 'string', 'length' => 200, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'eventtype_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'humidity' => ['type' => 'string', 'length' => null, 'default' => 'NA', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'temperature' => ['type' => 'string', 'length' => null, 'default' => 'NA', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ibuttoncode' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'supporttype' => ['type' => 'integer', 'length' => 10, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'servacc' => ['type' => 'integer', 'length' => 10, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'fuellevel' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'batteryvoltage' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'batterycurrent' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'gsmsignal' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'noofsatellite' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pcbtemp' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'powersupply' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'gpspwer' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'fuelcounter' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'canmessage' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'extramessage' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tripstatus' => ['type' => 'integer', 'length' => 10, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'tripdistance' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'activesimid' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'additionalstat' => ['type' => 'integer', 'length' => 10, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'imei' => 'Lorem ipsum dolor sit amet',
            'gpstime' => 1474279679,
            'msgdtime' => 1474279679,
            'latitude' => 1,
            'longitude' => 1,
            'speed' => 1,
            'heading' => 'Lorem ip',
            'altitude' => 1,
            'distance' => 1,
            'status' => 'Lorem ipsum dolor sit amet',
            'odometer' => 1,
            'digitalvalues' => 1,
            'analogvalues' => 'Lorem ipsum dolor sit amet',
            'acceleration' => 1,
            'deceleration' => 1,
            'extstatus' => 1,
            'trackingobject_id' => 1,
            'customer_id' => 1,
            'device_id' => 1,
            'location' => 'Lorem ipsum dolor sit amet',
            'eventtype_id' => 1,
            'humidity' => 'Lorem ipsum dolor sit amet',
            'temperature' => 'Lorem ipsum dolor sit amet',
            'ibuttoncode' => 'Lorem ipsum dolor sit amet',
            'supporttype' => 1,
            'servacc' => 1,
            'fuellevel' => 1,
            'batteryvoltage' => 1,
            'batterycurrent' => 1,
            'gsmsignal' => 1,
            'noofsatellite' => 1,
            'pcbtemp' => 1,
            'powersupply' => 1,
            'gpspwer' => 1,
            'fuelcounter' => 1,
            'canmessage' => 'Lorem ipsum dolor sit amet',
            'extramessage' => 'Lorem ipsum dolor sit amet',
            'tripstatus' => 1,
            'tripdistance' => 1,
            'activesimid' => 'Lorem ipsum dolor sit amet',
            'additionalstat' => 1
        ],
    ];
}
