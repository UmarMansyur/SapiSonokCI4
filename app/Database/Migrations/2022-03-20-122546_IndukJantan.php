<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IndukJantan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_induk_jantan' => [
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
        $this->forge->addPrimaryKey('id_induk_jantan');
        $this->forge->createTable('induk_jantan');
    }

    public function down()
    {
        $this->forge->dropTable('induk_jantan');
    }
}