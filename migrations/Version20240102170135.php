<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102170135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel VARCHAR(50) NOT NULL, mail VARCHAR(75) NOT NULL, UNIQUE INDEX UNIQ_C744045579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kine (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel VARCHAR(50) NOT NULL, mail VARCHAR(75) NOT NULL, idSpe INT NOT NULL, INDEX IDX_4CC38C4F9A59FEBD (idSpe), UNIQUE INDEX UNIQ_4CC38C4F79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prendre (date_rdv DATETIME NOT NULL, id_kine_id INT NOT NULL, id_client_id INT NOT NULL, INDEX IDX_D2CA36CD5641E2BC (id_kine_id), INDEX IDX_D2CA36CD99DED506 (id_client_id), PRIMARY KEY(date_rdv)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialisation (idSpe INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(idSpe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE kine ADD CONSTRAINT FK_4CC38C4F9A59FEBD FOREIGN KEY (idSpe) REFERENCES specialisation (idSpe)');
        $this->addSql('ALTER TABLE kine ADD CONSTRAINT FK_4CC38C4F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prendre ADD CONSTRAINT FK_D2CA36CD5641E2BC FOREIGN KEY (id_kine_id) REFERENCES kine (id)');
        $this->addSql('ALTER TABLE prendre ADD CONSTRAINT FK_D2CA36CD99DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045579F37AE5');
        $this->addSql('ALTER TABLE kine DROP FOREIGN KEY FK_4CC38C4F9A59FEBD');
        $this->addSql('ALTER TABLE kine DROP FOREIGN KEY FK_4CC38C4F79F37AE5');
        $this->addSql('ALTER TABLE prendre DROP FOREIGN KEY FK_D2CA36CD5641E2BC');
        $this->addSql('ALTER TABLE prendre DROP FOREIGN KEY FK_D2CA36CD99DED506');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE kine');
        $this->addSql('DROP TABLE prendre');
        $this->addSql('DROP TABLE specialisation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}