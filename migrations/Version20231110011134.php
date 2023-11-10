<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110011134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agences (id INT AUTO_INCREMENT NOT NULL, agence_id INT NOT NULL, nom_agence VARCHAR(20) NOT NULL, adresse_agence VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, nom_client VARCHAR(20) NOT NULL, prenom_client VARCHAR(20) NOT NULL, adresse_client VARCHAR(50) NOT NULL, date_de_naissance DATE NOT NULL, situation_familiale VARCHAR(20) NOT NULL, profession VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptes (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, compte_id INT NOT NULL, type VARCHAR(20) NOT NULL, date_ouverture DATE NOT NULL, solde NUMERIC(10, 0) NOT NULL, INDEX IDX_56735801DC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseillers (id INT AUTO_INCREMENT NOT NULL, agence_id_id INT DEFAULT NULL, conseiller_id INT NOT NULL, nom_conseiller VARCHAR(20) NOT NULL, prenom_conseiller VARCHAR(20) NOT NULL, email VARCHAR(20) NOT NULL, INDEX IDX_757D0F73D1F6E7C3 (agence_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lignes_comptes (id INT AUTO_INCREMENT NOT NULL, compte_id_id INT NOT NULL, ligne_id INT NOT NULL, date_operation DATE NOT NULL, description VARCHAR(50) NOT NULL, montant NUMERIC(10, 0) NOT NULL, INDEX IDX_1964D9FD86A5793C (compte_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation_client_conseiller (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation_client_conseiller_client (relation_client_conseiller_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_B3422E5BEC8C09CE (relation_client_conseiller_id), INDEX IDX_B3422E5B19EB6921 (client_id), PRIMARY KEY(relation_client_conseiller_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation_client_conseiller_conseillers (relation_client_conseiller_id INT NOT NULL, conseillers_id INT NOT NULL, INDEX IDX_4A1C3E08EC8C09CE (relation_client_conseiller_id), INDEX IDX_4A1C3E0899DA0202 (conseillers_id), PRIMARY KEY(relation_client_conseiller_id, conseillers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comptes ADD CONSTRAINT FK_56735801DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE conseillers ADD CONSTRAINT FK_757D0F73D1F6E7C3 FOREIGN KEY (agence_id_id) REFERENCES agences (id)');
        $this->addSql('ALTER TABLE lignes_comptes ADD CONSTRAINT FK_1964D9FD86A5793C FOREIGN KEY (compte_id_id) REFERENCES comptes (id)');
        $this->addSql('ALTER TABLE relation_client_conseiller_client ADD CONSTRAINT FK_B3422E5BEC8C09CE FOREIGN KEY (relation_client_conseiller_id) REFERENCES relation_client_conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE relation_client_conseiller_client ADD CONSTRAINT FK_B3422E5B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE relation_client_conseiller_conseillers ADD CONSTRAINT FK_4A1C3E08EC8C09CE FOREIGN KEY (relation_client_conseiller_id) REFERENCES relation_client_conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE relation_client_conseiller_conseillers ADD CONSTRAINT FK_4A1C3E0899DA0202 FOREIGN KEY (conseillers_id) REFERENCES conseillers (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes DROP FOREIGN KEY FK_56735801DC2902E0');
        $this->addSql('ALTER TABLE conseillers DROP FOREIGN KEY FK_757D0F73D1F6E7C3');
        $this->addSql('ALTER TABLE lignes_comptes DROP FOREIGN KEY FK_1964D9FD86A5793C');
        $this->addSql('ALTER TABLE relation_client_conseiller_client DROP FOREIGN KEY FK_B3422E5BEC8C09CE');
        $this->addSql('ALTER TABLE relation_client_conseiller_client DROP FOREIGN KEY FK_B3422E5B19EB6921');
        $this->addSql('ALTER TABLE relation_client_conseiller_conseillers DROP FOREIGN KEY FK_4A1C3E08EC8C09CE');
        $this->addSql('ALTER TABLE relation_client_conseiller_conseillers DROP FOREIGN KEY FK_4A1C3E0899DA0202');
        $this->addSql('DROP TABLE agences');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE comptes');
        $this->addSql('DROP TABLE conseillers');
        $this->addSql('DROP TABLE lignes_comptes');
        $this->addSql('DROP TABLE relation_client_conseiller');
        $this->addSql('DROP TABLE relation_client_conseiller_client');
        $this->addSql('DROP TABLE relation_client_conseiller_conseillers');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
