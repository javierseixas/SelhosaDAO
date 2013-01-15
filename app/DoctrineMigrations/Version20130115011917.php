<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130115011917 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Note ADD workorder_id INT NOT NULL");
        $this->addSql("ALTER TABLE Note ADD CONSTRAINT FK_6F8F552A2C1C3467 FOREIGN KEY (workorder_id) REFERENCES WorkOrder (id)");
        $this->addSql("CREATE INDEX IDX_6F8F552A2C1C3467 ON Note (workorder_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Note DROP FOREIGN KEY FK_6F8F552A2C1C3467");
        $this->addSql("DROP INDEX IDX_6F8F552A2C1C3467 ON Note");
        $this->addSql("ALTER TABLE Note DROP workorder_id");
    }
}
