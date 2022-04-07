<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Silsilah extends Migration
{
    public function up()
    {
       $this->forge->addField([
        'id_silsilah' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true
        ],
        'id_induk_betina' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true
        ],
        'id_sapi' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
        ],
        'id_induk_jantan' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true

        ],
       ]);
       $this->forge->addPrimaryKey('id_silsilah');
       $this->forge->addForeignKey('id_sapi', 'sapi', 'id_sapi');
       $this->forge->addForeignKey('id_induk_betina', 'induk_betina', 'id_induk_betina');
       $this->forge->addForeignKey('id_induk_jantan', 'induk_jantan', 'id_induk_jantan');
       $this->forge->createTable('silsilah');
   }

   public function down()
   {
       $this->forge->dropTable('silsilah');
   }
}