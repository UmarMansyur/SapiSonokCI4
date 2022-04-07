<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penawaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penawaran' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_pasangan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal_penawaran' => [
                'type' => 'DATE'
            ],
            'nominal_pembayaran' => [
                'type' => 'BIGINT',
                'constraint' => 20,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],
            'status_penawaran' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'update_at' => [
                'type' => 'DATE'
            ],
        ]);
        $this->forge->addKey('id_penawaran');
        $this->forge->addForeignKey('id_pasangan', 'pasangan', 'id_pasangan');
        $this->forge->createTable('penawaran');
    }

    public function down()
    {
        $this->forge->dropTable('penawaran');
    }
}