<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class Migration_Initial
*
* @property CI_DB_forge $dbforge
* @property CI_DB_query_builder | CI_DB_mysqli_driver $db
*/
class Migration_Initial extends CI_Migration {
    
    public function up() {
        
        /**
        * migration for activities
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => FALSE
            ),
            'copy' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('activities');
        
        /**
        * migration for ambassador
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'country' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'leader_gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'request_id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => TRUE
            ),
            'profile_link' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'fb_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'messenger_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
                'default' => '0'
            ),
            'is_joined' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '0'
            ),
            'join_following_team' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
                'default' => '0'
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'null' => FALSE
            ),
            'display' => array(
                'type' => 'TINYINT',
                'constraint' => 2,
                'null' => FALSE,
                'default' => '1'
            ),
            'code_button' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '0'
            ),
            'team_link_button' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '0'
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('request_id');
        
        $this->dbforge->create_table('ambassador');
        
        $sql = "ALTER TABLE `ambassador` CHANGE COLUMN `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $this->db->query($sql);
        
        /**
        * migration for article
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => FALSE
            ),
            'article' => array(
                'type' => 'TEXT',
                'null' => FALSE
            ),
            'writer' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'date' => array(
                'type' => 'TIMESTAMP',
                'null' => FALSE
            ),
            'pic' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('article');
        
        $sql = "ALTER TABLE `article` CHANGE COLUMN `date` `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $this->db->query($sql);
        
        /**
        * migration for books
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'name' => array(
                'type' => 'TINYTEXT',
                'null' => FALSE
            ),
            'writer' => array(
                'type' => 'TINYTEXT',
                'null' => FALSE
            ),
            'brief' => array(
                'type' => 'TEXT',
                'null' => FALSE
            ),
            'pic' => array(
                'type' => 'TEXT',
                'null' => FALSE
            ),
            'post' => array(
                'type' => 'TEXT',
                'null' => FALSE
            ),
            'link' => array(
                'type' => 'TINYTEXT',
                'null' => FALSE
            ),
            'resofrate' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'numofrate' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'numdownload' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'level' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'section' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'uploadname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'date' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('books');
        
        $sql = "ALTER TABLE `books` CHANGE COLUMN `date` `date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP";
        $this->db->query($sql);
        
        /**
        * migration for certificate
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'pic' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'activity_id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('certificate');
        
        /**
        * migration for evaluation
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'pic' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('evaluation');
        
        /**
        * migration for infographic
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'pic' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'section' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'series_id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'date' => array(
                'type' => 'TIMESTAMP',
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('infographic');
        
        $sql = "ALTER TABLE `infographic` CHANGE COLUMN `date` `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $this->db->query($sql);
        
        /**
        * migration for leader_info
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'leader_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'leader_link' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'team_link' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'leader_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'team_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'leader_gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => TRUE
            ),
            'uniqid' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'messenger_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
                'default' => '0'
            ),
            'leaders_team_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'leader_rank' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
                'default' => '5'
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('leader_info');
        
        /**
        * migration for leader_request
        */
        $this->dbforge->add_field(array(
            'Rid' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'members_num' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => FALSE
            ),
            'date' => array(
                'type' => 'TIMESTAMP',
                'null' => FALSE
            ),
            'leader_id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'is_done' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '0'
            ),
            'send_to_leader' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '0'
            ),
            'current_team_count' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'counter' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('Rid', TRUE);
        $this->dbforge->add_key('leader_id');
        
        $this->dbforge->create_table('leader_request');
        
        $sql = "ALTER TABLE `leader_request` CHANGE COLUMN `date` `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $this->db->query($sql);
        
        /**
        * migration for pages
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'viewers' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'page_order' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('pages');
        
        /**
        * migration for series
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'pic' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'num_of_photos' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('series');
        
        /**
        * migration for statistics
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'visitors' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
                'default' => '0'
            ),
            'page_id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE
            ),
            'date' => array(
                'type' => 'DATE',
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('statistics');
        
        /**
        * migration for suggestion_book
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'book_name' => array(
                'type' => 'TINYTEXT',
                'null' => FALSE
            ),
            'writer' => array(
                'type' => 'TINYTEXT',
                'null' => FALSE
            ),
            'brief' => array(
                'type' => 'TEXT',
                'null' => FALSE
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'found' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ),
            'link' => array(
                'type' => 'TINYTEXT',
                'null' => TRUE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('suggestion_book');
        
        /**
        * migration for users
        */
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'regstatus' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => '0'
            ),
            'team' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('users');
    }
    
    public function down() {
        
        /**
        * migration for activities
        */
        $this->dbforge->drop_table('activities');
        
        /**
        * migration for ambassador
        */
        $this->dbforge->drop_table('ambassador');
        
        /**
        * migration for article
        */
        $this->dbforge->drop_table('article');
        
        /**
        * migration for books
        */
        $this->dbforge->drop_table('books');
        
        /**
        * migration for certificate
        */
        $this->dbforge->drop_table('certificate');
        
        /**
        * migration for evaluation
        */
        $this->dbforge->drop_table('evaluation');
        
        /**
        * migration for infographic
        */
        $this->dbforge->drop_table('infographic');
        
        /**
        * migration for leader_info
        */
        $this->dbforge->drop_table('leader_info');
        
        /**
        * migration for leader_request
        */
        $this->dbforge->drop_table('leader_request');
        
        /**
        * migration for pages
        */
        $this->dbforge->drop_table('pages');
        
        /**
        * migration for series
        */
        $this->dbforge->drop_table('series');
        
        /**
        * migration for statistics
        */
        $this->dbforge->drop_table('statistics');
        
        /**
        * migration for suggestion_book
        */
        $this->dbforge->drop_table('suggestion_book');
        
        /**
        * migration for users
        */
        $this->dbforge->drop_table('users');
    }
    
}
