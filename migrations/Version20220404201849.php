<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404201849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE section_lesson');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFA9F87BD');
        $this->addSql('DROP INDEX IDX_2D737AEFA9F87BD ON section');
        $this->addSql('ALTER TABLE section DROP title_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE section_lesson (section_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_B23C86D5D823E37A (section_id), INDEX IDX_B23C86D5CDF80196 (lesson_id), PRIMARY KEY(section_id, lesson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE section_lesson ADD CONSTRAINT FK_B23C86D5CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_lesson ADD CONSTRAINT FK_B23C86D5D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section ADD title_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFA9F87BD FOREIGN KEY (title_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_2D737AEFA9F87BD ON section (title_id)');
    }
}
