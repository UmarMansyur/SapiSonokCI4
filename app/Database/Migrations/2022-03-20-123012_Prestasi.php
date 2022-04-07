<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prestasi extends Migration
{
    public function up()
    {
       $this->forge->addField([
        'id_prestasi' => [
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
        'prestasi' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'file_prestasi' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'tahun_prestasi' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
       ]);
       $this->forge->addPrimaryKey('id_prestasi');
       $this->forge->addForeignKey('id_pasangan', 'pasangan', 'id_pasangan');
       $this->forge->createTable('prestasi');
   }

   public function down()
   {
       $this->forge->dropTable('prestasi');
   }
}