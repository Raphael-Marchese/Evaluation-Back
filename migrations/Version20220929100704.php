<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929100704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, title VARCHAR(50) NOT NULL, releast_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', poster VARCHAR(255) DEFAULT NULL, INDEX IDX_1D5EF26F4296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_person (movie_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_CD1B4C038F93B6FC (movie_id), INDEX IDX_CD1B4C03217BBB47 (person_id), PRIMARY KEY(movie_id, person_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movie_person ADD CONSTRAINT FK_CD1B4C038F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_person ADD CONSTRAINT FK_CD1B4C03217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4296D31F');
        $this->addSql('ALTER TABLE movie_person DROP FOREIGN KEY FK_CD1B4C038F93B6FC');
        $this->addSql('ALTER TABLE movie_person DROP FOREIGN KEY FK_CD1B4C03217BBB47');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_person');
    }
}