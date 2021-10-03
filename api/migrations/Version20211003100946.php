<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003100946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Fix lan lot data structure mistake.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE county ADD lon DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE county ADD lat DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE weather DROP lon');
        $this->addSql('ALTER TABLE weather DROP lat');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE county DROP lon');
        $this->addSql('ALTER TABLE county DROP lat');
        $this->addSql('ALTER TABLE weather ADD lon DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE weather ADD lat DOUBLE PRECISION NOT NULL');
    }
}
