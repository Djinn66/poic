<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125104034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D472D441E4');
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D4FE19A1A8');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D472D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id)');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D4FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
        $this->addSql('ALTER TABLE epreuve CHANGE periodicite periodicite INT NOT NULL');
        $this->addSql('ALTER TABLE grade ADD abreviation VARCHAR(5) NOT NULL, ADD categorie VARCHAR(255) DEFAULT NULL, ADD rang SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE personnel ADD armee_id INT NOT NULL, ADD grade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE72D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEFE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
        $this->addSql('CREATE INDEX IDX_A6BCF3DE72D441E4 ON personnel (armee_id)');
        $this->addSql('CREATE INDEX IDX_A6BCF3DEFE19A1A8 ON personnel (grade_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D472D441E4');
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D4FE19A1A8');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D472D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D4FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve CHANGE periodicite periodicite DATE NOT NULL');
        $this->addSql('ALTER TABLE grade DROP abreviation, DROP categorie, DROP rang');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE72D441E4');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DEFE19A1A8');
        $this->addSql('DROP INDEX IDX_A6BCF3DE72D441E4 ON personnel');
        $this->addSql('DROP INDEX IDX_A6BCF3DEFE19A1A8 ON personnel');
        $this->addSql('ALTER TABLE personnel DROP armee_id, DROP grade_id');
    }
}
