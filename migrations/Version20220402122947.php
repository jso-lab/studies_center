<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220402122947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFFED07355');
        $this->addSql('DROP INDEX IDX_2D737AEFFED07355 ON section');
        $this->addSql('ALTER TABLE section DROP lessons_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section ADD lessons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFFED07355 FOREIGN KEY (lessons_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEFFED07355 ON section (lessons_id)');
    }
}
