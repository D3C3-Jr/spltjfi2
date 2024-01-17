<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SplMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'spl_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type'       => 'DATE',
            ],
            'shift' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'karyawan_id' => [
                'type'       => 'INT',
            ],
            'departement_id' => [
                'type'       => 'INT',
            ],
            'from' => [
                'type'       => 'TIME',
            ],
            'to' => [
                'type'       => 'TIME',
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
            'approve_foreman' => [
                'type'       => 'INT',
            ],
            'approve_manager' => [
                'type'       => 'INT',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
            ],
            
        ]);
        $this->forge->addKey('spl_id', true);
        $this->forge->createTable('spl');
    }

    public function down()
    {
        $this->forge->dropTable('spl');
    }
}
