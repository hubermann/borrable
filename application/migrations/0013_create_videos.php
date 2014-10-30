<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Videos extends CI_Migration
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
                "created_at"          =>        array(
                    "type"                =>        "DATETIME",
                ),

                "updated_at"          =>        array(
                    "type"                =>        "DATETIME",

                ),
		"titulo"    		=>        array(
                    "type"                =>        "VARCHAR",
                    "constraint"        	=>        255,
                ),

		"fecha"    		=>        array(
                    "type"                =>        "DATE",
                ),

		"url_video"    		=>        array(
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
        $this->dbforge->create_table('videos');//crea la tabla
    }

    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('videos');

    }
}
?>
