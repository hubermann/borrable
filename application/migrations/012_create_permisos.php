<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Permisos extends CI_Migration
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
                "default"               =>  0

            ),
            "role_id"    		=>        array(
                "type"                =>        "INT",
                "constraint"        	=>        2,
            ),

            "modulo"    		=>        array(
                "type"                =>        "VARCHAR",
                "constraint"        	=>        100,
            ),

            "url"    		=>        array(
                "type"                =>        "VARCHAR",
                "constraint"        	=>        100,
            ),

            "permiso"    		=>        array(
                "type"                =>        "INT",
                "constraint"        	=>        1,
            ),

            )
            );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('permisos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('permisos');
 
    }
}
?>