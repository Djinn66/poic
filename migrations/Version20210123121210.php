<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210123121210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade ADD abreviation VARCHAR(5) NOT NULL');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE72D441E4 FOREIGN KEY (armee_id) REFERENCES armee (id)');
        $this->addSql('CREATE INDEX IDX_A6BCF3DE72D441E4 ON personnel (armee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade DROP abreviation');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE72D441E4');
        $this->addSql('DROP INDEX IDX_A6BCF3DE72D441E4 ON personnel');
    }
}
