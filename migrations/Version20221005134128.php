<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005134128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_equipement CHANGE equipement2_id equipement2_id INT DEFAULT NULL, CHANGE equipement3_id equipement3_id INT DEFAULT NULL, CHANGE equipement4_id equipement4_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_equipement CHANGE equipement2_id equipement2_id INT NOT NULL, CHANGE equipement3_id equipement3_id INT NOT NULL, CHANGE equipement4_id equipement4_id INT NOT NULL');
    }
}
