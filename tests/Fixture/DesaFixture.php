<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DesaFixture
 *
 */
class DesaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'desa';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'kode_daerah' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nama_daerah' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'kecamatan_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
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
            'kode_daerah' => 'Lorem ipsum d',
            'nama_daerah' => 'Lorem ipsum dolor sit amet',
            'kecamatan_id' => 1,
            'dibuat_oleh' => 'Lorem ipsum dolor sit a',
            'tgl_dibuat' => '2016-04-10',
            'diubah_oleh' => 'Lorem ipsum dolor sit a',
            'tgl_diubah' => '2016-04-10'
        ],
    ];
}
