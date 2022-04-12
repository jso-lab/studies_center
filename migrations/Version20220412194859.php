<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412194859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE illustrations (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_830A942D591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE illustrations ADD CONSTRAINT FK_830A942D591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course DROP illustration');
        $this->addSql('ALTER TABLE lesson ADD videos_id INT DEFAULT NULL, DROP video');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3763C10B2 FOREIGN KEY (videos_id) REFERENCES videos (id)');
        $this->addSql('CREATE INDEX IDX_F87474F3763C10B2 ON lesson (videos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3763C10B2');
        $this->addSql('DROP TABLE illustrations');
        $this->addSql('DROP TABLE videos');
        $this->addSql('ALTER TABLE course ADD illustration LONGBLOB NOT NULL');
        $this->addSql('DROP INDEX IDX_F87474F3763C10B2 ON lesson');
        $this->addSql('ALTER TABLE lesson ADD video VARCHAR(255) NOT NULL, DROP videos_id');
    }
}
