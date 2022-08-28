<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220703204410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnage_equipement (id INT AUTO_INCREMENT NOT NULL, personnage_id INT NOT NULL, equipement1_id INT NOT NULL, equipement2_id INT NOT NULL, equipement3_id INT NOT NULL, equipement4_id INT NOT NULL, INDEX IDX_23E11DE65E315342 (personnage_id), INDEX IDX_23E11DE6B4315F43 (equipement1_id), INDEX IDX_23E11DE6A684F0AD (equipement2_id), INDEX IDX_23E11DE61E3897C8 (equipement3_id), INDEX IDX_23E11DE683EFAF71 (equipement4_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_equipement ADD CONSTRAINT FK_23E11DE65E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage_equipement ADD CONSTRAINT FK_23E11DE6B4315F43 FOREIGN KEY (equipement1_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE personnage_equipement ADD CONSTRAINT FK_23E11DE6A684F0AD FOREIGN KEY (equipement2_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE personnage_equipement ADD CONSTRAINT FK_23E11DE61E3897C8 FOREIGN KEY (equipement3_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE personnage_equipement ADD CONSTRAINT FK_23E11DE683EFAF71 FOREIGN KEY (equipement4_id) REFERENCES equipement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE personnage_equipement');
    }
}
