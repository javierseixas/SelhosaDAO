<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130212010910 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO ElectronicCategory (id,brand_id,code,description) VALUES
    		(1,1,'TV0', 'TV >= 50\'\''),
    		(2,1,'TV1', 'TV >= 40\'\' A < 50\'\''),
    		(3,1,'TV1', 'TV > 26\'\' A < 40\'\''),
    		(4,1,'TV1', 'TV <= 26\'\''),
    		(5,1,'PRJ', 'Video proyectores'),
    		(6,1,'PV', 'Videocámaras'),
    		(7,1,'DF', 'Cámaras digitales'),
    		(8,1,'DSL', 'Cámaras Reflex'),
    		(9,1,'HV', 'Home Video'),
    		(10,1,'AU', 'Hifi'),
    		(11,1,'ME', 'Mobile'),
    		(12,1,'GA', 'General Audio'),
    		(13,1,'GA2', 'General Audio LC'),
    		(14,1,'AC1', 'Accesorios')
    		");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM ElectronicCategory WHERE id BETWEEN 1 AND 14");
    }
}
