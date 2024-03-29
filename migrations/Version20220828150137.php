<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220828150137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA152A10D79E');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1554215645');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1592D3E6E2');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA154694F9AB');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA152A10D79E FOREIGN KEY (capitaine_id) REFERENCES personnage_equipement (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1554215645 FOREIGN KEY (millieu2_id) REFERENCES personnage_equipement (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1592D3E6E2 FOREIGN KEY (defenseur_id) REFERENCES personnage_equipement (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA154694F9AB FOREIGN KEY (millieu1_id) REFERENCES personnage_equipement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1592D3E6E2');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA154694F9AB');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1554215645');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA152A10D79E');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1592D3E6E2 FOREIGN KEY (defenseur_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA154694F9AB FOREIGN KEY (millieu1_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1554215645 FOREIGN KEY (millieu2_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA152A10D79E FOREIGN KEY (capitaine_id) REFERENCES personnage (id)');
    }
}
