<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Eventos extends CI_Migration
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
					"categoria_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
	
					"titulo"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"slug"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"descripcion"    		=>        array(
                    "type"                =>        "TEXT",
                ),
	
					"fecha_desde"    		=>        array(
                    "type"                =>        "DATE",
                ),
	
					"fecha_hasta"    		=>        array(
                    "type"                =>        "DATE",
                ),
	
					"lugar"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"horario"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        100,
                ),
	
					"pais"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        10,
                ),
	
					"ciudad"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        180,
                ),
	
					"coordenadas"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        250,
                  ),
          "status"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        1,
                ),
	
					"tags"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
					"filename"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('eventos');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('eventos');
 
    }
}
?>
