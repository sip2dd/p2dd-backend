<?php

use Phinx\Migration\AbstractMigration;

class CreateTarifItem extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('tarif_item');

        $table->addColumn('nama_item', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ])->addIndex(['nama_item']);

        $table->addColumn('satuan', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => true
        ]);

        $table->addColumn('jenis_izin_id', 'integer', [
            'default' => null,
            'limit' => 20,
            'null' => false
        ])->addIndex(['jenis_izin_id']);

        $table->addColumn('dibuat_oleh', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true
        ]);

        $table->addColumn('tgl_dibuat', 'datetime', [
            'default' => null,
            'limit' => 20,
            'null' => true
        ]);

        $table->addColumn('tgl_diubah', 'datetime', [
            'default' => null,
            'limit' => 20,
            'null' => true
        ]);

        $table->addColumn('diubah_oleh', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true
        ]);

        $table->create();
    }
}
