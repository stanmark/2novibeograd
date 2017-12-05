<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171123114551 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE game CHANGE bod_team1 bod_team1 INT DEFAULT NULL, CHANGE bod_team2 bod_team2 INT DEFAULT NULL, CHANGE number_set1 number_set1 INT DEFAULT NULL, CHANGE set_team2 set_team2 INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE game CHANGE bod_team1 bod_team1 INT NOT NULL, CHANGE bod_team2 bod_team2 INT NOT NULL, CHANGE number_set1 number_set1 INT NOT NULL, CHANGE set_team2 set_team2 INT NOT NULL');
    }
}
