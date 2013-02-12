<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130212010608 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO Brand (id,`name`) VALUES (1, 'Sony')");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM Brand WHERE id = 1");
    }
}
