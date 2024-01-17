<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KaryawanMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'karyawan_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'karyawan_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'karyawan_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'departement_id' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->addKey('karyawan_id', true);
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
