<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130206000239 extends AbstractMigration
{
    public function up(Schema $schema)
    {
    	$this->addSql("INSERT INTO WorkOrderStatus (id,description,keyword) VALUES 
    		(10, 'Diagnosticar', 'diagnose'),
    		(20, 'Demanar material', 'orderMaterial'),
    		(30, 'Rebre material', 'receiveMaterial'),
    		(40, 'Reparar', 'repair'),
    		(50, 'Tancar', 'close'),
    		(60, 'Tancades', 'closed')
    		");

    }

    public function down(Schema $schema)
    {
		$this->addSql("DELETE FROM WorkOrderStatus WHERE id IN (10, 20, 30, 40, 50, 60)");
    }
}
