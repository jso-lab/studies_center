<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220406091824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP is_verified, DROP is_connected, DROP roles');
        $this->addSql('ALTER TABLE student DROP roles, DROP is_connected, DROP is_verified');
        $this->addSql('ALTER TABLE teacher DROP roles, DROP is_connected, DROP is_verified');
        $this->addSql('ALTER TABLE user DROP is_connected, DROP is_verified, DROP roles');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD is_verified TINYINT(1) NOT NULL, ADD is_connected TINYINT(1) DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE student ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD is_connected TINYINT(1) DEFAULT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE teacher ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD is_connected TINYINT(1) DEFAULT NULL, ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user ADD is_connected TINYINT(1) DEFAULT NULL, ADD is_verified TINYINT(1) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
