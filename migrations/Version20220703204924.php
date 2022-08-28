<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220703204924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, defenseur_id INT NOT NULL, millieu1_id INT NOT NULL, millieu2_id INT NOT NULL, capitaine_id INT NOT NULL, createur_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, nom_equipe VARCHAR(255) NOT NULL, upvote INT NOT NULL, downvote INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_2449BA1592D3E6E2 (defenseur_id), INDEX IDX_2449BA154694F9AB (millieu1_id), INDEX IDX_2449BA1554215645 (millieu2_id), INDEX IDX_2449BA152A10D79E (capitaine_id), INDEX IDX_2449BA1573A201E5 (createur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1592D3E6E2 FOREIGN KEY (defenseur_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA154694F9AB FOREIGN KEY (millieu1_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1554215645 FOREIGN KEY (millieu2_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA152A10D79E FOREIGN KEY (capitaine_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1573A201E5 FOREIGN KEY (createur_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipe');
    }
}
