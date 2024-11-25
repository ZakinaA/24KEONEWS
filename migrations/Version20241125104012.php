<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241125104012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, num_rue INT NOT NULL, rue VARCHAR(50) NOT NULL, copos INT NOT NULL, ville VARCHAR(50) NOT NULL, tel INT NOT NULL, mail VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, descriptif VARCHAR(150) NOT NULL, prix DOUBLE PRECISION NOT NULL, quotite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD jour_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C220C6AD0 ON cours (jour_id)');
        $this->addSql('ALTER TABLE instrument ADD date_achat DATE DEFAULT NULL, ADD prix_achat INT NOT NULL, ADD utilisation VARCHAR(70) NOT NULL, ADD couleur VARCHAR(70) NOT NULL, CHANGE num_serie num_serie INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C220C6AD0');
        $this->addSql('DROP INDEX IDX_FDCA8C9C220C6AD0 ON cours');
        $this->addSql('ALTER TABLE cours DROP jour_id');
        $this->addSql('ALTER TABLE instrument DROP date_achat, DROP prix_achat, DROP utilisation, DROP couleur, CHANGE num_serie num_serie VARCHAR(50) NOT NULL');
    }
}
