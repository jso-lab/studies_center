<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404095928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33D60322AC');
        $this->addSql('DROP TABLE roles');
        $this->addSql('ALTER TABLE `admin` ADD roles JSON NOT NULL');
        $this->addSql('DROP INDEX IDX_B723AF33D60322AC ON student');
        $this->addSql('ALTER TABLE student DROP role_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `admin` DROP roles');
        $this->addSql('ALTER TABLE student ADD role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33D60322AC ON student (role_id)');
    }
}
