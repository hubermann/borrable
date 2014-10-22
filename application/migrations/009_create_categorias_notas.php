<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Categorias_notas extends CI_Migration
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
 
                ),
        		"nombre"    		=>        array(
                            "type"                =>        "TEXT",
                            "constraint"        	=>        100,
                        ),
        	
        		"slug"    		=>        array(
                            "type"                =>        "TEXT",
                            "constraint"        	=>        100,
                        ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('categorias_notas');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('categorias_notas');
 
    }
}
?>