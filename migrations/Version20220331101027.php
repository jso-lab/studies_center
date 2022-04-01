<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331101027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher DROP descritpion');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D5D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('CREATE INDEX IDX_B0F6A6D5D60322AC ON teacher (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D5D60322AC');
        $this->addSql('DROP INDEX IDX_B0F6A6D5D60322AC ON teacher');
        $this->addSql('ALTER TABLE teacher ADD descritpion LONGTEXT NOT NULL');
    }
}
