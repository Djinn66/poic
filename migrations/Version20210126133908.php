<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126133908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE validation_epreuve (id INT AUTO_INCREMENT NOT NULL, id_epreuve_id INT DEFAULT NULL, date DATE NOT NULL, resultat INT NOT NULL, INDEX IDX_C728B971E1383E1 (id_epreuve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE validation_epreuve ADD CONSTRAINT FK_C728B971E1383E1 FOREIGN KEY (id_epreuve_id) REFERENCES epreuve (id)');
        $this->addSql('ALTER TABLE personnel ADD id_validation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE1C0F9935 FOREIGN KEY (id_validation_id) REFERENCES validation_epreuve (id)');
        $this->addSql('CREATE INDEX IDX_A6BCF3DE1C0F9935 ON personnel (id_validation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE1C0F9935');
        $this->addSql('DROP TABLE validation_epreuve');
        $this->addSql('DROP INDEX IDX_A6BCF3DE1C0F9935 ON personnel');
        $this->addSql('ALTER TABLE personnel DROP id_validation_id');
    }
}
