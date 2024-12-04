<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127084039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_pret ADD eleve_id INT DEFAULT NULL, ADD instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contrat_pret ADD CONSTRAINT FK_1FB84C67A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE contrat_pret ADD CONSTRAINT FK_1FB84C67CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE INDEX IDX_1FB84C67A6CC7B2 ON contrat_pret (eleve_id)');
        $this->addSql('CREATE INDEX IDX_1FB84C67CF11D9C ON contrat_pret (instrument_id)');
        $this->addSql('ALTER TABLE instrument ADD type_instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DD7C1CAAA9 FOREIGN KEY (type_instrument_id) REFERENCES type_instrument (id)');
        $this->addSql('CREATE INDEX IDX_3CBF69DD7C1CAAA9 ON instrument (type_instrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat_pret DROP FOREIGN KEY FK_1FB84C67A6CC7B2');
        $this->addSql('ALTER TABLE contrat_pret DROP FOREIGN KEY FK_1FB84C67CF11D9C');
        $this->addSql('DROP INDEX IDX_1FB84C67A6CC7B2 ON contrat_pret');
        $this->addSql('DROP INDEX IDX_1FB84C67CF11D9C ON contrat_pret');
        $this->addSql('ALTER TABLE contrat_pret DROP eleve_id, DROP instrument_id');
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DD7C1CAAA9');
        $this->addSql('DROP INDEX IDX_3CBF69DD7C1CAAA9 ON instrument');
        $this->addSql('ALTER TABLE instrument DROP type_instrument_id');
    }
}