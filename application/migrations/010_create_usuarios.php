<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Usuarios extends CI_Migration
{
    public function up()
    {
        //TABLA 
            $this->dbforge->add_field(
            array(
            "id"        =>        array(
                "type"                =>        "INT",
                "constraint"        =>        11,
                "unsigned"            =>        TRUE,
                "auto_increment"    =>        TRUE,

            ),
            "status"        =>        array(
                "type"                =>        "INT",
                "constraint"          =>        1,
                "default"           =>            0,

            ),
            "nombre"    		=>        array(
                "type"                =>        "TEXT",
                "constraint"        	=>        100,
            ),

            "apellido"    		=>        array(
                "type"                =>        "TEXT",
                "constraint"        	=>        100,
            ),

            "email"    		=>        array(
                "type"                =>        "TEXT",
                "constraint"        	=>        100,
            ),

            "password"    		=>        array(
                "type"                =>        "VARCHAR",
                "constraint"        	=>        250,
            ),

            "salt"    		=>        array(
                "type"                =>        "VARCHAR",
                "constraint"        	=>        100,
            ),

            "role_id"    		=>        array(
                "type"                =>        "INT",
                "constraint"        	=>        2,
            ),

            "created_at"    		=>        array(
                "type"                =>        "DATETIME",
            ),

            "updated_at"    		=>        array(
                "type"                =>        "DATETIME",

            ),

            "filename"    		=>        array(
                "type"                =>        "VARCHAR",
                "constraint"        	=>        255,
            ),

            )
            );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('usuarios');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('usuarios');
 
    }
}
?>