<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211105094147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents ADD id_agent_id INT NOT NULL, ADD agent_id_id INT NOT NULL, ADD id_role_id INT NOT NULL');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6E64CF9D9E FOREIGN KEY (id_agent_id) REFERENCES dossier_adherent (id)');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6E46EAB62F FOREIGN KEY (agent_id_id) REFERENCES encaissement (id)');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6E89E8BDC FOREIGN KEY (id_role_id) REFERENCES role_agent (id)');
        $this->addSql('CREATE INDEX IDX_9596AB6E64CF9D9E ON agents (id_agent_id)');
        $this->addSql('CREATE INDEX IDX_9596AB6E46EAB62F ON agents (agent_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9596AB6E89E8BDC ON agents (id_role_id)');
        $this->addSql('ALTER TABLE contrat ADD dossier_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_60349993B6C48410 FOREIGN KEY (dossier_id_id) REFERENCES dossier_adherent (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60349993B6C48410 ON contrat (dossier_id_id)');
        $this->addSql('ALTER TABLE demande ADD societe_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A515969199 FOREIGN KEY (societe_id_id) REFERENCES societe (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A515969199 ON demande (societe_id_id)');
        $this->addSql('ALTER TABLE dossier_adherent ADD id_adherent_id INT NOT NULL, ADD adherent_id_id INT NOT NULL, ADD agent_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE dossier_adherent ADD CONSTRAINT FK_B89312173DE2A1A4 FOREIGN KEY (id_adherent_id) REFERENCES adherents (id)');
        $this->addSql('ALTER TABLE dossier_adherent ADD CONSTRAINT FK_B89312177C4E834B FOREIGN KEY (adherent_id_id) REFERENCES adherents (id)');
        $this->addSql('ALTER TABLE dossier_adherent ADD CONSTRAINT FK_B893121746EAB62F FOREIGN KEY (agent_id_id) REFERENCES agents (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B89312173DE2A1A4 ON dossier_adherent (id_adherent_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B89312177C4E834B ON dossier_adherent (adherent_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B893121746EAB62F ON dossier_adherent (agent_id_id)');
        $this->addSql('ALTER TABLE encaissement ADD id_encaissement_id INT NOT NULL, ADD agent_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE encaissement ADD CONSTRAINT FK_5D4869B08679E1B9 FOREIGN KEY (id_encaissement_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE encaissement ADD CONSTRAINT FK_5D4869B046EAB62F FOREIGN KEY (agent_id_id) REFERENCES agents (id)');
        $this->addSql('CREATE INDEX IDX_5D4869B08679E1B9 ON encaissement (id_encaissement_id)');
        $this->addSql('CREATE INDEX IDX_5D4869B046EAB62F ON encaissement (agent_id_id)');
        $this->addSql('ALTER TABLE facture ADD id_contrat_id INT NOT NULL, ADD contrat_id_id INT NOT NULL, ADD facture_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410BDA986C8 FOREIGN KEY (id_contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664108506F791 FOREIGN KEY (contrat_id_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410ED7016E0 FOREIGN KEY (facture_id_id) REFERENCES encaissement (id)');
        $this->addSql('CREATE INDEX IDX_FE866410BDA986C8 ON facture (id_contrat_id)');
        $this->addSql('CREATE INDEX IDX_FE8664108506F791 ON facture (contrat_id_id)');
        $this->addSql('CREATE INDEX IDX_FE866410ED7016E0 ON facture (facture_id_id)');
        $this->addSql('ALTER TABLE intervention ADD demande_id_id INT NOT NULL, ADD agent_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB899A1D7E FOREIGN KEY (demande_id_id) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB46EAB62F FOREIGN KEY (agent_id_id) REFERENCES agents (id)');
        $this->addSql('CREATE INDEX IDX_D11814AB899A1D7E ON intervention (demande_id_id)');
        $this->addSql('CREATE INDEX IDX_D11814AB46EAB62F ON intervention (agent_id_id)');
        $this->addSql('ALTER TABLE societe ADD id_societe_id INT NOT NULL, ADD societe_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD597DF5D4 FOREIGN KEY (id_societe_id) REFERENCES dossier_adherent (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD15969199 FOREIGN KEY (societe_id_id) REFERENCES dossier_adherent (id)');
        $this->addSql('CREATE INDEX IDX_19653DBD597DF5D4 ON societe (id_societe_id)');
        $this->addSql('CREATE INDEX IDX_19653DBD15969199 ON societe (societe_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6E64CF9D9E');
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6E46EAB62F');
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6E89E8BDC');
        $this->addSql('DROP INDEX IDX_9596AB6E64CF9D9E ON agents');
        $this->addSql('DROP INDEX IDX_9596AB6E46EAB62F ON agents');
        $this->addSql('DROP INDEX UNIQ_9596AB6E89E8BDC ON agents');
        $this->addSql('ALTER TABLE agents DROP id_agent_id, DROP agent_id_id, DROP id_role_id');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_60349993B6C48410');
        $this->addSql('DROP INDEX UNIQ_60349993B6C48410 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP dossier_id_id');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A515969199');
        $this->addSql('DROP INDEX IDX_2694D7A515969199 ON demande');
        $this->addSql('ALTER TABLE demande DROP societe_id_id');
        $this->addSql('ALTER TABLE dossier_adherent DROP FOREIGN KEY FK_B89312173DE2A1A4');
        $this->addSql('ALTER TABLE dossier_adherent DROP FOREIGN KEY FK_B89312177C4E834B');
        $this->addSql('ALTER TABLE dossier_adherent DROP FOREIGN KEY FK_B893121746EAB62F');
        $this->addSql('DROP INDEX UNIQ_B89312173DE2A1A4 ON dossier_adherent');
        $this->addSql('DROP INDEX UNIQ_B89312177C4E834B ON dossier_adherent');
        $this->addSql('DROP INDEX UNIQ_B893121746EAB62F ON dossier_adherent');
        $this->addSql('ALTER TABLE dossier_adherent DROP id_adherent_id, DROP adherent_id_id, DROP agent_id_id');
        $this->addSql('ALTER TABLE encaissement DROP FOREIGN KEY FK_5D4869B08679E1B9');
        $this->addSql('ALTER TABLE encaissement DROP FOREIGN KEY FK_5D4869B046EAB62F');
        $this->addSql('DROP INDEX IDX_5D4869B08679E1B9 ON encaissement');
        $this->addSql('DROP INDEX IDX_5D4869B046EAB62F ON encaissement');
        $this->addSql('ALTER TABLE encaissement DROP id_encaissement_id, DROP agent_id_id');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410BDA986C8');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664108506F791');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410ED7016E0');
        $this->addSql('DROP INDEX IDX_FE866410BDA986C8 ON facture');
        $this->addSql('DROP INDEX IDX_FE8664108506F791 ON facture');
        $this->addSql('DROP INDEX IDX_FE866410ED7016E0 ON facture');
        $this->addSql('ALTER TABLE facture DROP id_contrat_id, DROP contrat_id_id, DROP facture_id_id');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB899A1D7E');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB46EAB62F');
        $this->addSql('DROP INDEX IDX_D11814AB899A1D7E ON intervention');
        $this->addSql('DROP INDEX IDX_D11814AB46EAB62F ON intervention');
        $this->addSql('ALTER TABLE intervention DROP demande_id_id, DROP agent_id_id');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD597DF5D4');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD15969199');
        $this->addSql('DROP INDEX IDX_19653DBD597DF5D4 ON societe');
        $this->addSql('DROP INDEX IDX_19653DBD15969199 ON societe');
        $this->addSql('ALTER TABLE societe DROP id_societe_id, DROP societe_id_id');
    }
}
