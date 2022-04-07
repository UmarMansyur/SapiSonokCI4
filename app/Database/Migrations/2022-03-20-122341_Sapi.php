<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sapi extends Migration
{
    public function up()
    {
       $this->forge->addField([
        'id_sapi' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true
        ],
        'nama_sapi' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'jenis_kelamin' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
        'tanggal_lahir' => [
            'type' => 'date',
        ],
        'status_sapi' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
       ]);
       $this->forge->addPrimaryKey('id_sapi');
       $this->forge->createTable('sapi');
   }

   public function down()
   {
       $this->forge->dropTable('sapi');
   }
}