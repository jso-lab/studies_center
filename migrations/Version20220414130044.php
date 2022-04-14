<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414130044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9D823E37A FOREIGN KEY (section_id) REFERENCES category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_169E6FB9D823E37A ON course (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9D823E37A');
        $this->addSql('DROP INDEX UNIQ_169E6FB9D823E37A ON course');
        $this->addSql('ALTER TABLE course DROP section_id');
    }
}
