<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130124074722 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE User_Groups (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_140FA8ACA76ED395 (user_id), INDEX IDX_140FA8ACFE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Technician_WorkOrder (technician_id INT NOT NULL, workorder_id INT NOT NULL, INDEX IDX_519909E6C5D496 (technician_id), INDEX IDX_5199092C1C3467 (workorder_id), PRIMARY KEY(technician_id, workorder_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', UNIQUE INDEX UNIQ_F7C13C465E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE User_Groups ADD CONSTRAINT FK_140FA8ACA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE User_Groups ADD CONSTRAINT FK_140FA8ACFE54D947 FOREIGN KEY (group_id) REFERENCES Groups (id)");
        $this->addSql("ALTER TABLE Technician_WorkOrder ADD CONSTRAINT FK_519909E6C5D496 FOREIGN KEY (technician_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Technician_WorkOrder ADD CONSTRAINT FK_5199092C1C3467 FOREIGN KEY (workorder_id) REFERENCES WorkOrder (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE User_Groups DROP FOREIGN KEY FK_140FA8ACFE54D947");
        $this->addSql("DROP TABLE User_Groups");
        $this->addSql("DROP TABLE Technician_WorkOrder");
        $this->addSql("DROP TABLE Groups");
    }
}
