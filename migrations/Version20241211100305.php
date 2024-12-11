<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211100305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours ADD typecours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C22A6F638 FOREIGN KEY (typecours_id) REFERENCES type_cours (id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C22A6F638 ON cours (typecours_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C22A6F638');
        $this->addSql('DROP INDEX IDX_FDCA8C9C22A6F638 ON cours');
        $this->addSql('ALTER TABLE cours DROP typecours_id');
    }
}
