<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130217201135 extends AbstractMigration
{
    public function up(Schema $schema)
    {
    	$this->addSql("INSERT INTO ElectronicCategory (id,brand_id,description,code) VALUES (15,1,'TV 32\'\'','TV2_B')");
    	$this->addSql("UPDATE ElectronicCategory SET code = 'TV2', description = 'TV > 32\'\' A < 40\'\'' WHERE id = 3");
    	$this->addSql("UPDATE ElectronicCategory SET code = 'TV3' WHERE id = 4");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM ElectronicCategory WHERE id = 15");
    }
}
