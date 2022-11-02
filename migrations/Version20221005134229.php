<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005134229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_equipement CHANGE equipement1_id equipement1_id INT DEFAULT NULL');
        $this->addSql("INSERT INTO `equipe` (`id`, `defenseur_id`, `millieu1_id`, `millieu2_id`, `capitaine_id`, `createur_id`, `type`, `nom_equipe`, `upvote`, `downvote`, `date`) VALUES
        (1, 1, 2, 3, 4, 3, NULL, 'Test Equipe', 1, 0, '2022-08-28 17:05:08'),
        (2, 2, 4, 1, 3, 3, NULL, 'Test Equipe 2', 0, 0, '2022-08-28 17:05:08'),
        (3, 34, 32, 33, 31, 3, NULL, 'Greg\'s team', 0, 0, '2022-10-05 14:18:04'),
        (4, 38, 36, 37, 35, 3, NULL, 'Greg\'s team', 0, 0, '2022-10-05 15:34:02'),
        (5, 42, 40, 41, 39, 3, NULL, 'Greg\'s team', 0, 0, '2022-10-05 15:35:03'),
        (6, 50, 48, 49, 47, 3, NULL, 'aaa', 0, 0, '2022-10-05 15:49:29'),
        (7, 54, 52, 53, 51, 3, NULL, 'Mon equipe', 0, 0, '2022-10-05 16:02:17'),
        (8, 64, 62, 63, 61, 3, NULL, '', 0, 0, '2022-10-05 16:17:56'),
        (9, 68, 66, 67, 65, 3, NULL, '', 0, 0, '2022-10-05 16:18:00'),
        (10, 75, 73, 74, 72, 3, NULL, 'hgiougiuo', 0, 0, '2022-10-05 16:18:39'),
        (11, 136, 134, 135, 133, 3, NULL, 'Greg\'s team', 0, 0, '2022-10-05 16:39:21')");

        $this->addSql("INSERT INTO `equipement` (`id`, `nom`, `categorie`, `type`, `force_diff`, `vitesse_diff`, `tir_diff`, `passe_diff`, `technique_diff`) VALUES
        (1, 'Casque Turbo', 'Casque', 'Turbo', 0, 2, 0, 0, -2),
        (2, 'Gants Turbo', 'Gants', 'Turbo', -2, 2, 0, 0, 0),
        (3, 'Plastron Turbo', 'Plastron', 'Turbo', 0, 2, 0, -2, 0),
        (4, 'Chaussure Turbo', 'Chaussure', 'Turbo', 0, 2, -2, 0, 0),
        (6, 'Gants Bushido', 'Gants', 'Bushido', -1, -1, -1, -1, 4),
        (7, 'Plastron Bushido', 'Plastron', 'Bushido', 4, -1, -1, -1, -1),
        (8, 'Chaussure Bushido', 'Chaussure', 'Bushido', -1, 4, -1, -1, -1),
        (9, 'Casque Bushido', 'Casque', 'Bushido', -1, -1, -1, 4, -1);");

        $this->addSql("INSERT INTO `personnage` (`id`, `nom`, `force_v`, `vitesse_v`, `tir_v`, `passe_v`, `technique_v`, `image`) VALUES
        (1, 'MARIO', 11, 12, 14, 10, 16, 'Mario.png'),
        (2, 'LUIGI', 11, 11, 10, 14, 17, 'Luigi.png'),
        (3, 'BOWSER', 17, 9, 17, 11, 9, 'Bowser.png'),
        (4, 'PEACH', 9, 17, 9, 13, 15, 'Peach.png'),
        (5, 'HARMONIE', 14, 9, 17, 10, 13, 'Harmonie.png'),
        (6, 'TOAD', 9, 17, 11, 15, 11, 'Toad.png'),
        (7, 'YOSHI', 10, 10, 17, 17, 9, 'Yoshi.png'),
        (8, 'DONKEY KONG', 16, 9, 13, 16, 9, 'DonkeyKong.png'),
        (9, 'WARIO', 17, 9, 15, 13, 9, 'Wario.png'),
        (10, 'WALUIGI', 15, 16, 9, 9, 14, 'Waluigi.png');");

        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_equipement CHANGE equipement1_id equipement1_id INT NOT NULL');
    }
}
