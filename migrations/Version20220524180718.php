<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524180718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (
            id INT AUTO_INCREMENT NOT NULL, 
            title VARCHAR(255) DEFAULT NULL, 
            authors VARCHAR(255) DEFAULT NULL, 
            average_rating FLOAT DEFAULT NULL, 
            isbn VARCHAR(255) DEFAULT NULL, 
            isbn13 VARCHAR(255) DEFAULT NULL, 
            language_code VARCHAR(255) DEFAULT NULL, 
            num_pages INT DEFAULT NULL, 
            ratings_count INT DEFAULT NULL, 
            text_reviews_count INT DEFAULT NULL, 
            publication_date VARCHAR(255) DEFAULT NULL, 
            publisher VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = MYISAM');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE book');
    }
}
