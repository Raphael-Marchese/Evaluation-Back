<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220929114804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'role and relation between person and movie';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('ALTER TABLE movie_person ADD person_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie_person ADD CONSTRAINT FK_CD1B4C03217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_CD1B4C03217BBB47 ON movie_person (person_id)');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176B2AEB241');
        $this->addSql('DROP INDEX IDX_34DCD176B2AEB241 ON person');
        $this->addSql('ALTER TABLE person DROP movie_person_id');
    }

    public function down(Schema $schema): void
    {

        $this->addSql('ALTER TABLE person ADD movie_person_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176B2AEB241 FOREIGN KEY (movie_person_id) REFERENCES movie_person (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_34DCD176B2AEB241 ON person (movie_person_id)');
        $this->addSql('ALTER TABLE movie_person DROP FOREIGN KEY FK_CD1B4C03217BBB47');
        $this->addSql('DROP INDEX IDX_CD1B4C03217BBB47 ON movie_person');
        $this->addSql('ALTER TABLE movie_person DROP person_id');
    }
}
