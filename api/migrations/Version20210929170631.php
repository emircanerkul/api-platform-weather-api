<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929170631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE city_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE county_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weather_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weather_status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE city (id INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE county (id INT NOT NULL, city_id INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_58E2FF258BAC62AF ON county (city_id)');
        $this->addSql('CREATE TABLE weather (id INT NOT NULL, city_id INT NOT NULL, county_id INT NOT NULL, status_id INT NOT NULL, lon DOUBLE PRECISION NOT NULL, lat DOUBLE PRECISION NOT NULL, weather VARCHAR(64) NOT NULL, temp DOUBLE PRECISION NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4CD0D36E8BAC62AF ON weather (city_id)');
        $this->addSql('CREATE INDEX IDX_4CD0D36E85E73F45 ON weather (county_id)');
        $this->addSql('CREATE INDEX IDX_4CD0D36E6BF700BD ON weather (status_id)');
        $this->addSql('CREATE TABLE weather_status (id INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE county ADD CONSTRAINT FK_58E2FF258BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weather ADD CONSTRAINT FK_4CD0D36E8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weather ADD CONSTRAINT FK_4CD0D36E85E73F45 FOREIGN KEY (county_id) REFERENCES county (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weather ADD CONSTRAINT FK_4CD0D36E6BF700BD FOREIGN KEY (status_id) REFERENCES weather_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE county DROP CONSTRAINT FK_58E2FF258BAC62AF');
        $this->addSql('ALTER TABLE weather DROP CONSTRAINT FK_4CD0D36E8BAC62AF');
        $this->addSql('ALTER TABLE weather DROP CONSTRAINT FK_4CD0D36E85E73F45');
        $this->addSql('ALTER TABLE weather DROP CONSTRAINT FK_4CD0D36E6BF700BD');
        $this->addSql('DROP SEQUENCE city_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE county_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weather_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weather_status_id_seq CASCADE');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE county');
        $this->addSql('DROP TABLE weather');
        $this->addSql('DROP TABLE weather_status');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
    }
}
