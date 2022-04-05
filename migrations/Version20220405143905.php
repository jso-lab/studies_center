<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405143905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD is_connected TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE student CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP is_connected');
        $this->addSql('ALTER TABLE student CHANGE password password VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE user DROP email, DROP password');
    }
}
