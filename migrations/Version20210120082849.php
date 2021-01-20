<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120082849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE grade_armee');
        $this->addSql('ALTER TABLE armee_epreuve MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE armee_epreuve DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE armee_epreuve ADD armee_id INT NOT NULL, ADD epreuve_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE armee_epreuve ADD CONSTRAINT FK_69DD50B972D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE armee_epreuve ADD CONSTRAINT FK_69DD50B9AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_69DD50B972D441E4 ON armee_epreuve (armee_id)');
        $this->addSql('CREATE INDEX IDX_69DD50B9AB990336 ON armee_epreuve (epreuve_id)');
        $this->addSql('ALTER TABLE armee_epreuve ADD PRIMARY KEY (armee_id, epreuve_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grade_armee (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE armee_epreuve DROP FOREIGN KEY FK_69DD50B972D441E4');
        $this->addSql('ALTER TABLE armee_epreuve DROP FOREIGN KEY FK_69DD50B9AB990336');
        $this->addSql('DROP INDEX IDX_69DD50B972D441E4 ON armee_epreuve');
        $this->addSql('DROP INDEX IDX_69DD50B9AB990336 ON armee_epreuve');
        $this->addSql('ALTER TABLE armee_epreuve ADD id INT AUTO_INCREMENT NOT NULL, DROP armee_id, DROP epreuve_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
