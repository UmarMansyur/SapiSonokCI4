<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IndukBetina extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_induk_betina' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_sapi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('id_induk_betina');
        $this->forge->addForeignKey('id_sapi', 'sapi', 'id_sapi');
        $this->forge->createTable('induk_betina');
    }

    public function down()
    {
        $this->forge->dropTable('induk_betina');
    }
}