<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929110523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_person (id INT AUTO_INCREMENT NOT NULL, movie_id INT NOT NULL, role JSON NOT NULL, INDEX IDX_CD1B4C038F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_person_person (movie_person_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_178A7637B2AEB241 (movie_person_id), INDEX IDX_178A7637217BBB47 (person_id), PRIMARY KEY(movie_person_id, person_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_person ADD CONSTRAINT FK_CD1B4C038F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE movie_person_person ADD CONSTRAINT FK_178A7637B2AEB241 FOREIGN KEY (movie_person_id) REFERENCES movie_person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_person_person ADD CONSTRAINT FK_178A7637217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_person DROP FOREIGN KEY FK_CD1B4C038F93B6FC');
        $this->addSql('ALTER TABLE movie_person_person DROP FOREIGN KEY FK_178A7637B2AEB241');
        $this->addSql('ALTER TABLE movie_person_person DROP FOREIGN KEY FK_178A7637217BBB47');
        $this->addSql('DROP TABLE movie_person');
        $this->addSql('DROP TABLE movie_person_person');
    }
}
