<?php

use Phinx\Migration\AbstractMigration;

class CreateNotifikasiPengguna extends AbstractMigration
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
        $table = $this->table('notifikasi_pengguna');

        $table->addColumn('grup_notifikasi', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ])->addIndex(['grup_notifikasi']);

        $table->addColumn('pesan', 'string', [
            'default' => null,
            'limit' => 500,
            'null' => false
        ]);

        $table->addColumn('pengguna_id', 'biginteger', [
            'default' => null,
            'null' => false
        ])->addIndex(['pengguna_id']);

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
