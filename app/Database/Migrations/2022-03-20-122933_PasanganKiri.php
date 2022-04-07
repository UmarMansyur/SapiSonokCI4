<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PasanganKiri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pasangan_kiri' => [
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
        $this->forge->addPrimaryKey('id_pasangan_kiri');
        $this->forge->addForeignKey('id_sapi', 'sapi', 'id_sapi');
        $this->forge->createTable('pasangan_kiri');
    }

    public function down()
    {
        $this->forge->dropTable('pasangan_kiri');
    }
}