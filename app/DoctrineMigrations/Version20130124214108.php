<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130124214108 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Technician_WorkOrder DROP FOREIGN KEY FK_5199092C1C3467");
        $this->addSql("ALTER TABLE Technician_WorkOrder DROP FOREIGN KEY FK_519909E6C5D496");
        $this->addSql("ALTER TABLE Technician_WorkOrder ADD CONSTRAINT FK_5199092C1C3467 FOREIGN KEY (workorder_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Technician_WorkOrder ADD CONSTRAINT FK_519909E6C5D496 FOREIGN KEY (technician_id) REFERENCES WorkOrder (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Technician_WorkOrder DROP FOREIGN KEY FK_519909E6C5D496");
        $this->addSql("ALTER TABLE Technician_WorkOrder DROP FOREIGN KEY FK_5199092C1C3467");
        $this->addSql("ALTER TABLE Technician_WorkOrder ADD CONSTRAINT FK_519909E6C5D496 FOREIGN KEY (technician_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Technician_WorkOrder ADD CONSTRAINT FK_5199092C1C3467 FOREIGN KEY (workorder_id) REFERENCES WorkOrder (id)");
    }
}
