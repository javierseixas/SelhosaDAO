<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130218064604 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE ElectronicCategory_Intervention (electronic_category_id INT NOT NULL, intervention_id INT NOT NULL, INDEX IDX_AD73F98F5352B0C (electronic_category_id), INDEX IDX_AD73F988EAE3863 (intervention_id), PRIMARY KEY(electronic_category_id, intervention_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE ElectronicCategory_Intervention ADD CONSTRAINT FK_AD73F98F5352B0C FOREIGN KEY (electronic_category_id) REFERENCES ElectronicCategory (id) ON UPDATE CASCADE");
        $this->addSql("ALTER TABLE ElectronicCategory_Intervention ADD CONSTRAINT FK_AD73F988EAE3863 FOREIGN KEY (intervention_id) REFERENCES Intervention (id) ON UPDATE CASCADE");
        $this->addSql("ALTER TABLE Intervention DROP FOREIGN KEY FK_C929CF53F5352B0C");
        $this->addSql("DROP INDEX IDX_C929CF53F5352B0C ON Intervention");
        $this->addSql("ALTER TABLE Intervention DROP electronic_category_id");

    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE ElectronicCategory_Intervention");
        $this->addSql("ALTER TABLE Intervention ADD electronic_category_id INT NOT NULL");
        $this->addSql("ALTER TABLE Intervention ADD CONSTRAINT FK_C929CF53F5352B0C FOREIGN KEY (electronic_category_id) REFERENCES ElectronicCategory (id) ON UPDATE CASCADE");
        $this->addSql("CREATE INDEX IDX_C929CF53F5352B0C ON Intervention (electronic_category_id)");
    }
}
