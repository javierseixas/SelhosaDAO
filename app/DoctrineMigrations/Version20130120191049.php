<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130120191049 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE WorkOrder ADD current_status_id INT NOT NULL");
        $this->addSql("ALTER TABLE WorkOrder ADD CONSTRAINT FK_12FFFF1CB0D1B111 FOREIGN KEY (current_status_id) REFERENCES WorkOrderStatus (id)");
        $this->addSql("CREATE INDEX IDX_12FFFF1CB0D1B111 ON WorkOrder (current_status_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE WorkOrder DROP FOREIGN KEY FK_12FFFF1CB0D1B111");
        $this->addSql("DROP INDEX IDX_12FFFF1CB0D1B111 ON WorkOrder");
        $this->addSql("ALTER TABLE WorkOrder DROP current_status_id");
    }
}
