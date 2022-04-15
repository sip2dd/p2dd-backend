<?php
use Migrations\AbstractMigration;

class CreatePesanDibaca extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('pesan_dibaca');
        $table->addColumn('instansi_id', 'biginteger', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('data_labels', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('del', 'integer', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('dibuat_oleh', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true,
        ]);
        $table->addColumn('tgl_dibuat', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('diubah_oleh', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true,
        ]);
        $table->addColumn('tgl_diubah', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('pesan_id', 'biginteger', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('pegawai_id', 'biginteger', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('keterangan', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->create();
    }
}
