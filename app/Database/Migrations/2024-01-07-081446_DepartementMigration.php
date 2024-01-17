<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DepartementMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'departement_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'departement_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'departement_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('departement_id', true);
        $this->forge->createTable('departement');
    }

    public function down()
    {
        $this->forge->dropTable('departement');
    }
}
