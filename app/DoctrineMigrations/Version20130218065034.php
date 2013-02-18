<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130218065034 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO Intervention (id, code, description) VALUES
            (1,'','Intervenció simple'),
            (2,'','Reparació'),
            (3,'','Canvi producte'),
            (4,'','Gestió reparació')
        ");


        $this->addSql("INSERT INTO ElectronicCategory_Intervention (electronic_category_id, intervention_id) VALUES
            (1,1),
            (1,2),
            (1,3),
            (2,1),
            (2,2),
            (2,3),
            (3,1),
            (3,2),
            (3,3),
            (4,1),
            (4,2),
            (4,3),
            (5,1),
            (5,2),
            (5,3),
            (6,1),
            (6,2),
            (6,3),
            (7,1),
            (7,2),
            (7,3),
            (8,1),
            (8,2),
            (8,3),
            (9,1),
            (9,2),
            (9,3),
            (10,1),
            (10,2),
            (10,3),
            (11,1),
            (11,2),
            (11,3),
            (12,1),
            (12,2),
            (12,3),
            (13,1),
            (13,2),
            (13,3),
            (14,1),
            (14,2),
            (14,3),
            (15,1),
            (15,2),
            (15,3)
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM ElectronicCategory_Intervention WHERE intervention_id BETWEEN 1 AND 4");
        $this->addSql("DELETE FROM Intervention WHERE id BETWEEN 1 AND 4");
    }
}
