<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130217192642 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Intervention (id INT AUTO_INCREMENT NOT NULL, electronic_category_id INT NOT NULL, code VARCHAR(10) NOT NULL, description VARCHAR(100) NOT NULL, INDEX IDX_C929CF53F5352B0C (electronic_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Charges (id INT AUTO_INCREMENT NOT NULL, repair_id INT NOT NULL, intervention_id INT DEFAULT NULL, realWorkedTime INT DEFAULT NULL, chargebleTime INT DEFAULT NULL, INDEX IDX_F552698643833CFF (repair_id), INDEX IDX_F55269868EAE3863 (intervention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE Intervention ADD CONSTRAINT FK_C929CF53F5352B0C FOREIGN KEY (electronic_category_id) REFERENCES ElectronicCategory (id) ON UPDATE CASCADE ON DELETE RESTRICT");
        $this->addSql("ALTER TABLE Charges ADD CONSTRAINT FK_F552698643833CFF FOREIGN KEY (repair_id) REFERENCES Repair (id) ON UPDATE CASCADE ON DELETE RESTRICT");
        $this->addSql("ALTER TABLE Charges ADD CONSTRAINT FK_F55269868EAE3863 FOREIGN KEY (intervention_id) REFERENCES Intervention (id) ON UPDATE CASCADE ON DELETE SET NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Charges DROP FOREIGN KEY FK_F552698643833CFF");
        $this->addSql("ALTER TABLE Charges DROP FOREIGN KEY FK_F55269868EAE3863");
        $this->addSql("DROP TABLE Intervention");
        $this->addSql("DROP TABLE Charges");
    }
}
