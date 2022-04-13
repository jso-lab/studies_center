<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413145837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F329C1004E');
        $this->addSql('DROP INDEX IDX_F87474F329C1004E ON lesson');
        $this->addSql('ALTER TABLE lesson DROP video_id');
        $this->addSql('ALTER TABLE video ADD lesson_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CCDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7CC7DA2CCDF80196 ON video (lesson_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson ADD video_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F329C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('CREATE INDEX IDX_F87474F329C1004E ON lesson (video_id)');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CCDF80196');
        $this->addSql('DROP INDEX UNIQ_7CC7DA2CCDF80196 ON video');
        $this->addSql('ALTER TABLE video DROP lesson_id, CHANGE name name VARCHAR(255) DEFAULT NULL');
    }
}
