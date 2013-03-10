<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130310174205 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE DOARepair (id INT NOT NULL, rmaid VARCHAR(20) NOT NULL, credit_memo VARCHAR(20) NOT NULL, credit_delivery VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE CEPLRepair (id INT NOT NULL, delivery_note VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE DOARepair ADD CONSTRAINT FK_4F3C789DBF396750 FOREIGN KEY (id) REFERENCES WorkOrder (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE CEPLRepair ADD CONSTRAINT FK_EC05EEE2BF396750 FOREIGN KEY (id) REFERENCES WorkOrder (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE DOARepair");
        $this->addSql("DROP TABLE CEPLRepair");
    }
}
