<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TemplateKondisiFixture
 *
 */
class TemplateKondisiFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'template_kondisi';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'kelompok_data_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'nama_tabel_utama' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nama_tabel_1' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nama_kolom_1' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tipe_kondisi' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nama_tabel_2' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nama_kolom_2' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tipe_relasi' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
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
            'kelompok_data_id' => 1,
            'nama_tabel_utama' => 'Lorem ipsum dolor sit a',
            'nama_tabel_1' => 'Lorem ipsum dolor sit a',
            'nama_kolom_1' => 'Lorem ipsum dolor sit a',
            'tipe_kondisi' => 'Lorem ip',
            'nama_tabel_2' => 'Lorem ipsum dolor sit a',
            'nama_kolom_2' => 'Lorem ipsum dolor sit a',
            'tipe_relasi' => 'Lorem ip',
            'dibuat_oleh' => 'Lorem ipsum dolor sit a',
            'tgl_dibuat' => '2016-07-16',
            'diubah_oleh' => 'Lorem ipsum dolor sit a',
            'tgl_diubah' => '2016-07-16'
        ],
    ];
}
