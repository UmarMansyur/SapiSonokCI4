<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aksesoris extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aksesoris' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_aksesoris' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deksripsi_aksesoris' => [
                'type' => 'text',
                'null' => true
            ],
            'file_aksesoris' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);
        $this->forge->addKey('id_aksesoris', TRUE);
        $this->forge->createTable('aksesoris', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('aksesoris');
    }
}