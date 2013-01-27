<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130126193114 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE WorkOrder_Status_Changes (id INT AUTO_INCREMENT NOT NULL, workorder_id INT NOT NULL, previous_status_id INT DEFAULT NULL, new_status_id INT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_1582F24C2C1C3467 (workorder_id), INDEX IDX_1582F24C6C852FBC (previous_status_id), INDEX IDX_1582F24C596805D2 (new_status_id), INDEX IDX_1582F24CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE WorkOrder_Status_Changes ADD CONSTRAINT FK_1582F24C2C1C3467 FOREIGN KEY (workorder_id) REFERENCES WorkOrder (id)");
        $this->addSql("ALTER TABLE WorkOrder_Status_Changes ADD CONSTRAINT FK_1582F24C6C852FBC FOREIGN KEY (previous_status_id) REFERENCES WorkOrderStatus (id)");
        $this->addSql("ALTER TABLE WorkOrder_Status_Changes ADD CONSTRAINT FK_1582F24C596805D2 FOREIGN KEY (new_status_id) REFERENCES WorkOrderStatus (id)");
        $this->addSql("ALTER TABLE WorkOrder_Status_Changes ADD CONSTRAINT FK_1582F24CA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE WorkOrder_Status_Changes");
    }
}
