<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190810212204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE achat (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, personnel_id INT DEFAULT NULL, date DATE NOT NULL, INDEX IDX_26A98456670C757F (fournisseur_id), INDEX IDX_26A984561C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_achat (id INT AUTO_INCREMENT NOT NULL, achat_id INT DEFAULT NULL, article_id INT DEFAULT NULL, qte NUMERIC(15, 3) NOT NULL, prix_unit NUMERIC(15, 3) NOT NULL, INDEX IDX_25056E66FE95D117 (achat_id), INDEX IDX_25056E667294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas_ligne_sortie (id INT AUTO_INCREMENT NOT NULL, repas_id INT DEFAULT NULL, ligne_sortie_id INT DEFAULT NULL, qte NUMERIC(15, 3) NOT NULL, INDEX IDX_D18B5B171D236AAA (repas_id), INDEX IDX_D18B5B17397D6DB (ligne_sortie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_sortie (id INT AUTO_INCREMENT NOT NULL, sortie_id INT DEFAULT NULL, article_id INT DEFAULT NULL, qte NUMERIC(10, 2) NOT NULL, qte_restante NUMERIC(10, 2) NOT NULL, INDEX IDX_1AE54FB4CC72D953 (sortie_id), INDEX IDX_1AE54FB47294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_sortie__ligne_stock (id INT AUTO_INCREMENT NOT NULL, ligne_sortie_id INT DEFAULT NULL, ligne_stock_id INT DEFAULT NULL, qte NUMERIC(15, 3) NOT NULL, INDEX IDX_FCFF8EC397D6DB (ligne_sortie_id), INDEX IDX_FCFF8EC52577026 (ligne_stock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_stock (id INT AUTO_INCREMENT NOT NULL, ligne_achat_id INT DEFAULT NULL, stock_id INT DEFAULT NULL, qte_initial NUMERIC(10, 2) NOT NULL, qte_restante NUMERIC(10, 2) NOT NULL, qte_invalide NUMERIC(10, 2) NOT NULL, INDEX IDX_489ABC50A10FC021 (ligne_achat_id), INDEX IDX_489ABC50DCD6110 (stock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repas (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, type VARCHAR(45) NOT NULL, qte NUMERIC(10, 2) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie (id INT AUTO_INCREMENT NOT NULL, personnel_id INT DEFAULT NULL, reference VARCHAR(45) NOT NULL, date DATE NOT NULL, INDEX IDX_3C3FD3F21C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, qte_critique NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_categorie (stock_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_D1E030DCDCD6110 (stock_id), INDEX IDX_D1E030DCBCF5E72D (categorie_id), PRIMARY KEY(stock_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom VARCHAR(45) NOT NULL, code VARCHAR(45) NOT NULL, etat TINYINT(1) NOT NULL, remarque LONGTEXT NOT NULL, unite VARCHAR(2) NOT NULL, INDEX IDX_23A0E66BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, nom_ministere VARCHAR(45) NOT NULL, nom_dir VARCHAR(45) NOT NULL, magasinier VARCHAR(45) NOT NULL, econome VARCHAR(45) NOT NULL, ville VARCHAR(45) NOT NULL, tel VARCHAR(30) NOT NULL, fax VARCHAR(30) NOT NULL, annee_scol VARCHAR(10) NOT NULL, adresse VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nom_prenom VARCHAR(45) NOT NULL, activite VARCHAR(45) NOT NULL, adresse VARCHAR(45) NOT NULL, matricule_fisc VARCHAR(45) NOT NULL, tel VARCHAR(30) NOT NULL, fax VARCHAR(30) NOT NULL, ville VARCHAR(30) NOT NULL, code_post INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, fonction_id INT DEFAULT NULL, nom_prenom VARCHAR(45) NOT NULL, INDEX IDX_A6BCF3DE57889920 (fonction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A984561C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE ligne_achat ADD CONSTRAINT FK_25056E66FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id)');
        $this->addSql('ALTER TABLE ligne_achat ADD CONSTRAINT FK_25056E667294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE repas_ligne_sortie ADD CONSTRAINT FK_D18B5B171D236AAA FOREIGN KEY (repas_id) REFERENCES repas (id)');
        $this->addSql('ALTER TABLE repas_ligne_sortie ADD CONSTRAINT FK_D18B5B17397D6DB FOREIGN KEY (ligne_sortie_id) REFERENCES ligne_sortie (id)');
        $this->addSql('ALTER TABLE ligne_sortie ADD CONSTRAINT FK_1AE54FB4CC72D953 FOREIGN KEY (sortie_id) REFERENCES sortie (id)');
        $this->addSql('ALTER TABLE ligne_sortie ADD CONSTRAINT FK_1AE54FB47294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_sortie__ligne_stock ADD CONSTRAINT FK_FCFF8EC397D6DB FOREIGN KEY (ligne_sortie_id) REFERENCES ligne_sortie (id)');
        $this->addSql('ALTER TABLE ligne_sortie__ligne_stock ADD CONSTRAINT FK_FCFF8EC52577026 FOREIGN KEY (ligne_stock_id) REFERENCES ligne_stock (id)');
        $this->addSql('ALTER TABLE ligne_stock ADD CONSTRAINT FK_489ABC50A10FC021 FOREIGN KEY (ligne_achat_id) REFERENCES ligne_achat (id)');
        $this->addSql('ALTER TABLE ligne_stock ADD CONSTRAINT FK_489ABC50DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE sortie ADD CONSTRAINT FK_3C3FD3F21C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('ALTER TABLE stock_categorie ADD CONSTRAINT FK_D1E030DCDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_categorie ADD CONSTRAINT FK_D1E030DCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE57889920 FOREIGN KEY (fonction_id) REFERENCES fonction (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_achat DROP FOREIGN KEY FK_25056E66FE95D117');
        $this->addSql('ALTER TABLE ligne_stock DROP FOREIGN KEY FK_489ABC50A10FC021');
        $this->addSql('ALTER TABLE repas_ligne_sortie DROP FOREIGN KEY FK_D18B5B17397D6DB');
        $this->addSql('ALTER TABLE ligne_sortie__ligne_stock DROP FOREIGN KEY FK_FCFF8EC397D6DB');
        $this->addSql('ALTER TABLE ligne_sortie__ligne_stock DROP FOREIGN KEY FK_FCFF8EC52577026');
        $this->addSql('ALTER TABLE repas_ligne_sortie DROP FOREIGN KEY FK_D18B5B171D236AAA');
        $this->addSql('ALTER TABLE ligne_sortie DROP FOREIGN KEY FK_1AE54FB4CC72D953');
        $this->addSql('ALTER TABLE ligne_stock DROP FOREIGN KEY FK_489ABC50DCD6110');
        $this->addSql('ALTER TABLE stock_categorie DROP FOREIGN KEY FK_D1E030DCDCD6110');
        $this->addSql('ALTER TABLE ligne_achat DROP FOREIGN KEY FK_25056E667294869C');
        $this->addSql('ALTER TABLE ligne_sortie DROP FOREIGN KEY FK_1AE54FB47294869C');
        $this->addSql('ALTER TABLE stock_categorie DROP FOREIGN KEY FK_D1E030DCBCF5E72D');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66BCF5E72D');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE57889920');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A98456670C757F');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A984561C109075');
        $this->addSql('ALTER TABLE sortie DROP FOREIGN KEY FK_3C3FD3F21C109075');
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE ligne_achat');
        $this->addSql('DROP TABLE repas_ligne_sortie');
        $this->addSql('DROP TABLE ligne_sortie');
        $this->addSql('DROP TABLE ligne_sortie__ligne_stock');
        $this->addSql('DROP TABLE ligne_stock');
        $this->addSql('DROP TABLE repas');
        $this->addSql('DROP TABLE sortie');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE stock_categorie');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE fonction');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE personnel');
    }
}
