<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211003104703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Delete unnecessary weather fields.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE weather DROP CONSTRAINT fk_4cd0d36e8bac62af');
        $this->addSql('DROP INDEX idx_4cd0d36e8bac62af');
        $this->addSql('ALTER TABLE weather DROP city_id');
        $this->addSql('ALTER TABLE weather DROP weather');
        $this->addSql('ALTER TABLE weather DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE weather ADD city_id INT NOT NULL');
        $this->addSql('ALTER TABLE weather ADD weather VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE weather ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE weather ADD CONSTRAINT fk_4cd0d36e8bac62af FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_4cd0d36e8bac62af ON weather (city_id)');
    }
}
