<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Notas extends CI_Migration
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
		"titulo"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
		"extracto"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        300,
                ),
	
		"slug"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
		"contenido"    		=>        array(
                    "type"                =>        "TEXT",
            
                ),
	
		"fecha"    		=>        array(
                    "type"                =>        "DATE",
                    
                ),
	
		"categoria_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
		"autor_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
		"fuente_nombre"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        250,
                ),
	
		"fuente_url"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
		"main_image"    		=>        array(
      
      "type"                =>        "INT",                    
      "constraint"        	=>        10,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('notas');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('notas');
 
    }
}
?>
