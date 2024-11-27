<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127103103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6B7660B01');
        $this->addSql('DROP INDEX IDX_5E90F6D6B7660B01 ON inscription');
        $this->addSql('ALTER TABLE inscription CHANGE elevee_id eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6A6CC7B2 ON inscription (eleve_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6A6CC7B2');
        $this->addSql('DROP INDEX IDX_5E90F6D6A6CC7B2 ON inscription');
        $this->addSql('ALTER TABLE inscription CHANGE eleve_id elevee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6B7660B01 FOREIGN KEY (elevee_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6B7660B01 ON inscription (elevee_id)');
    }
}
