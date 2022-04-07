<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pasangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pasangan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_pasangan' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'NOT NULL' => true,
            ],
            'id_pasangan_kanan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_pasangan_kiri' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
    
        ]);
        $this->forge->addPrimaryKey('id_pasangan');
        $this->forge->addForeignKey('id_pasangan_kanan', 'pasangan_kanan', 'id_pasangan_kanan');
        $this->forge->addForeignKey('id_pasangan_kiri', 'pasangan_kiri', 'id_pasangan_kiri');
        $this->forge->createTable('pasangan');
    }

    public function down()
    {
        $this->forge->dropTable('pasangan');
    }
}