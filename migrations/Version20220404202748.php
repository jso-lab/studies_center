<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404202748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP sections');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3D823E37A');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3F9295384');
        $this->addSql('DROP INDEX IDX_F87474F3D823E37A ON lesson');
        $this->addSql('DROP INDEX IDX_F87474F3F9295384 ON lesson');
        $this->addSql('ALTER TABLE lesson DROP courses_id, DROP section_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD sections LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE lesson ADD courses_id INT DEFAULT NULL, ADD section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3F9295384 FOREIGN KEY (courses_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_F87474F3D823E37A ON lesson (section_id)');
        $this->addSql('CREATE INDEX IDX_F87474F3F9295384 ON lesson (courses_id)');
    }
}
