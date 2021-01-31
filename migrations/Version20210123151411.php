<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210123151411 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D472D441E4');
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D4FE19A1A8');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D472D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id)');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D4FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
        $this->addSql('ALTER TABLE personnel ADD grade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEFE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id)');
        $this->addSql('CREATE INDEX IDX_A6BCF3DEFE19A1A8 ON personnel (grade_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D472D441E4');
        $this->addSql('ALTER TABLE armee_grade DROP FOREIGN KEY FK_8668E5D4FE19A1A8');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D472D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE armee_grade ADD CONSTRAINT FK_8668E5D4FE19A1A8 FOREIGN KEY (grade_id) REFERENCES grade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DEFE19A1A8');
        $this->addSql('DROP INDEX IDX_A6BCF3DEFE19A1A8 ON personnel');
        $this->addSql('ALTER TABLE personnel DROP grade_id');
    }
}
