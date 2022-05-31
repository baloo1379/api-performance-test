<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524180526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE song (
            id INT AUTO_INCREMENT NOT NULL,
            title VARCHAR(255) DEFAULT NULL,
            artist VARCHAR(255) DEFAULT NULL,
            top_genre VARCHAR(255) DEFAULT NULL,
            year VARCHAR(255) DEFAULT NULL,
            bpm INT DEFAULT NULL,
            nrgy INT DEFAULT NULL,
            dnce INT DEFAULT NULL,
            d_b INT DEFAULT NULL,
            live INT DEFAULT NULL,
            val INT DEFAULT NULL,
            dur INT DEFAULT NULL,
            acous INT DEFAULT NULL,
            spch INT DEFAULT NULL,
            pop INT DEFAULT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MYISAM');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE song');
    }
}
