<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlurProsesFixture
 *
 */
class AlurProsesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'keterangan' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'dibuat_oleh' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tgl_dibuat' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'diubah_oleh' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tgl_diubah' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
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
            'keterangan' => 'Lorem ipsum dolor sit a',
            'dibuat_oleh' => 'Lorem ipsum dolor sit a',
            'tgl_dibuat' => '2016-05-25',
            'diubah_oleh' => 'Lorem ipsum dolor sit a',
            'tgl_diubah' => '2016-05-25'
        ],
    ];
}
