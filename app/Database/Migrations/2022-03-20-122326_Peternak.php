<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peternak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peternak' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_peternak' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nomor_telpon' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_daftar' => [
                'type' => 'DATE'
            ],
            'update_at' => [
                'type' => 'DATE'
            ],     
            'status_admin' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status_akun' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'update_at' => [
                'type' => 'DATE'
            ],
        ]);
        $this->forge->addKey('id_peternak');
        $this->forge->createTable('peternak');
    }

    public function down()
    {
        $this->forge->dropTable('peternak');
    }
}