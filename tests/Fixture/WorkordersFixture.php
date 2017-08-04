<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WorkordersFixture
 *
 */
class WorkordersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'issuedate' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'workorderstatus_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'vehicle_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'startdate' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'lables' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'odometer' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'void' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'vendor_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'completiondate' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'labour' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'parts' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'dicount' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'tax' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'issuedby_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'assignedby_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'assignto_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'invoicenumber' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'phonenumber' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'customer_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'taxtype' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
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
            'issuedate' => '2017-08-04',
            'workorderstatus_id' => 1,
            'vehicle_id' => 1,
            'startdate' => '2017-08-04',
            'lables' => 'Lorem ipsum dolor sit amet',
            'odometer' => 1,
            'void' => 1,
            'vendor_id' => 1,
            'completiondate' => '2017-08-04',
            'labour' => 1,
            'parts' => 1,
            'dicount' => 1,
            'tax' => 1,
            'issuedby_id' => 1,
            'assignedby_id' => 1,
            'assignto_id' => 1,
            'invoicenumber' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'phonenumber' => 'Lorem ipsum dolor sit amet',
            'customer_id' => 1,
            'taxtype' => 1
        ],
    ];
}
