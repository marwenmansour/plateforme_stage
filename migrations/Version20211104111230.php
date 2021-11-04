<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104111230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, mail LONGTEXT NOT NULL, tel INT NOT NULL, adresse_perso LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, fonction LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, date_creation DATE NOT NULL, montant_contrat DOUBLE PRECISION NOT NULL, date_signature DATE NOT NULL, pdf LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, type_demande LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, statut LONGTEXT NOT NULL, pieces_jointes LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier_adherent (id INT AUTO_INCREMENT NOT NULL, libelle LONGTEXT NOT NULL, date_creation DATE NOT NULL, activite LONGTEXT NOT NULL, adresse_pro LONGTEXT NOT NULL, statut LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encaissement (id INT AUTO_INCREMENT NOT NULL, date_transaction DATE NOT NULL, montant_encaisse DOUBLE PRECISION NOT NULL, moyen_payement LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, date_facture DATE NOT NULL, montant_total DOUBLE PRECISION NOT NULL, reste_paye DOUBLE PRECISION NOT NULL, pdf LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, date_intervention DATE NOT NULL, statut LONGTEXT NOT NULL, rapport_intervention LONGTEXT NOT NULL, pieces_jointes LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_agent (id INT AUTO_INCREMENT NOT NULL, libelle_role LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, libelle LONGTEXT NOT NULL, date_creation DATE NOT NULL, activite LONGTEXT NOT NULL, adresse_pro LONGTEXT NOT NULL, pieces_justificatives LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adherents');
        $this->addSql('DROP TABLE agents');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE dossier_adherent');
        $this->addSql('DROP TABLE encaissement');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE role_agent');
        $this->addSql('DROP TABLE societe');
    }
}
