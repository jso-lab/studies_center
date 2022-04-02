<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220402122636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFFED07355');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFFED07355 FOREIGN KEY (lessons_id) REFERENCES course (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFFED07355');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFFED07355 FOREIGN KEY (lessons_id) REFERENCES lesson (id)');
    }
}
