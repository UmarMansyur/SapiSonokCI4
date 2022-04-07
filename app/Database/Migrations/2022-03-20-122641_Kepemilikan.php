<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kepemilikan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kepemilikan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_peternak' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_sapi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal_awal_kepemilikan' => [
                'type' => 'DATE'
            ]
        ]);
        $this->forge->addPrimaryKey('id_kepemilikan');
        $this->forge->addForeignKey('id_peternak', 'peternak', 'id_peternak');
        $this->forge->addForeignKey('id_sapi', 'sapi', 'id_sapi');
        $this->forge->createTable('kepemilikan');
    }
    
    public function down()
    {
        $this->forge->dropTable('kepemilikan');
    }
}