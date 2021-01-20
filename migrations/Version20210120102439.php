<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120102439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armee_grade (armee_id INT NOT NULL, grade_id INT NOT NULL, INDEX IDX_8668E5D472D441E4 (armee_id), INDEX IDX_8668E5D4FE19A1A8 (grade_id), PRIMARY KEY(armee_id, grade_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epreuve_personnel (epreuve_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_72E39813AB990336 (epreuve_id), INDEX IDX_72E398131C109075 (personnel_id), PRIMARY KEY(epreuve_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D472D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D4FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_personnel ADD CONSTRAINT FK_72E39813AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_personnel ADD CONSTRAINT FK_72E398131C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE personnel_epreuve');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnel_epreuve (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, resultat INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE armee_grade');
        $this->addSql('DROP TABLE epreuve_personnel');
    }
}
