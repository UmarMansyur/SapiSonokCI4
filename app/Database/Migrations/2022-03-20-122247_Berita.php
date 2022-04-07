<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'judul_berita' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'deskripsi_berita' => [
                'type' => 'text',
                'null' => true
            ],
            'tanggal_berita' => [
                'type' => 'DATETIME',
            ],
            'ditampilkan' => [
                'type' => 'INT',
                'constraint' => 100
            ]
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('berita', true);
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}