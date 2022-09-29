<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220929105921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add movie entity';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, title VARCHAR(50) NOT NULL, release_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', poster VARCHAR(255) DEFAULT NULL, INDEX IDX_1D5EF26F4296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
    }

    public function down(Schema $schema): void
    {

        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4296D31F');
        $this->addSql('DROP TABLE movie');
    }
}
