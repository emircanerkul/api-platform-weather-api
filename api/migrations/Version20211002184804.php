<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211002184804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create sample user';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('insert into "user" ("email", "id", "password", "roles") values (\'user@emircanerkul.com\', \'2cd0ef01-06bf-4a3a-b172-ae4fe51f4cc2\', \'$2y$13$nk5gVerW5v51Zogf2bkP7uEXsCYDoA.M52uBY7RSjtnVZeR43WnHq\', \'{"0":"ROLE_USER"}\');');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('delete from "user" where id = \'2cd0ef01-06bf-4a3a-b172-ae4fe51f4cc2\'');
    }
}
