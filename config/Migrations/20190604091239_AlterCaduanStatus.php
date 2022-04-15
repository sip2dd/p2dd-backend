<?php
use Migrations\AbstractMigration;

class AlterCaduanStatus extends AbstractMigration
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
        $table = $this->table('c_aduan');
        $table->changeColumn('status', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => true,
        ]);
        $table->update();
    }
}
