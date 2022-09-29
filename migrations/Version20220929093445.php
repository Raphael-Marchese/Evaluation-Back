<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929093445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, title VARCHAR(50) NOT NULL, release_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', poster VARCHAR(255) DEFAULT NULL, INDEX IDX_1D5EF26F4296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_realisator (movie_id INT NOT NULL, realisator_id INT NOT NULL, INDEX IDX_A3E0FCAF8F93B6FC (movie_id), INDEX IDX_A3E0FCAF139504F0 (realisator_id), PRIMARY KEY(movie_id, realisator_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_actor (movie_id INT NOT NULL, actor_id INT NOT NULL, INDEX IDX_3A374C658F93B6FC (movie_id), INDEX IDX_3A374C6510DAF24A (actor_id), PRIMARY KEY(movie_id, actor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movie_realisator ADD CONSTRAINT FK_A3E0FCAF8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_realisator ADD CONSTRAINT FK_A3E0FCAF139504F0 FOREIGN KEY (realisator_id) REFERENCES realisator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_actor ADD CONSTRAINT FK_3A374C658F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_actor ADD CONSTRAINT FK_3A374C6510DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4296D31F');
        $this->addSql('ALTER TABLE movie_realisator DROP FOREIGN KEY FK_A3E0FCAF8F93B6FC');
        $this->addSql('ALTER TABLE movie_realisator DROP FOREIGN KEY FK_A3E0FCAF139504F0');
        $this->addSql('ALTER TABLE movie_actor DROP FOREIGN KEY FK_3A374C658F93B6FC');
        $this->addSql('ALTER TABLE movie_actor DROP FOREIGN KEY FK_3A374C6510DAF24A');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_realisator');
        $this->addSql('DROP TABLE movie_actor');
    }
}
