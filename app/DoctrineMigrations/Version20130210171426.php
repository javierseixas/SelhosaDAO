<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130210171426 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE ElectronicCategory (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, code VARCHAR(40) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_6CC1136D44F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Electronic (id INT AUTO_INCREMENT NOT NULL, electronic_category_id INT DEFAULT NULL, model VARCHAR(40) NOT NULL, INDEX IDX_5132338EF5352B0C (electronic_category_id), INDEX reference_IDX_1 (model), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE ElectronicCategory ADD CONSTRAINT FK_6CC1136D44F5D008 FOREIGN KEY (brand_id) REFERENCES Brand (id) ON UPDATE CASCADE ON DELETE RESTRICT");
        $this->addSql("ALTER TABLE Electronic ADD CONSTRAINT FK_5132338EF5352B0C FOREIGN KEY (electronic_category_id) REFERENCES ElectronicCategory (id) ON UPDATE CASCADE ON DELETE SET NULL");
        $this->addSql("ALTER TABLE Repair ADD electronic_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE Repair ADD CONSTRAINT FK_894831172288CAE FOREIGN KEY (electronic_id) REFERENCES Electronic (id) ON UPDATE CASCADE ON DELETE RESTRICT");
        $this->addSql("CREATE INDEX IDX_894831172288CAE ON Repair (electronic_id)");
    }

    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Electronic DROP FOREIGN KEY FK_5132338EF5352B0C");
        $this->addSql("ALTER TABLE ElectronicCategory DROP FOREIGN KEY FK_6CC1136D44F5D008");
        $this->addSql("ALTER TABLE Repair DROP FOREIGN KEY FK_894831172288CAE");
        $this->addSql("DROP TABLE ElectronicCategory");
        $this->addSql("DROP TABLE Brand");
        $this->addSql("DROP TABLE Electronic");
        $this->addSql("DROP INDEX IDX_894831172288CAE ON Repair");
        $this->addSql("ALTER TABLE Repair DROP electronic_id");
    }
}
