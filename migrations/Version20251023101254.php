<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251023101254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Chambremhadhbichaima ADD Hospitalmhadhbichaima_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Chambremhadhbichaima ADD CONSTRAINT FK_C509E4FF63DBB69 FOREIGN KEY (Hospitalmhadhbichaima_id) REFERENCES Hospitalmhadhbichaima (id)');
        $this->addSql('CREATE INDEX IDX_C509E4FF63DBB69 ON Chambremhadhbichaima (Hospitalmhadhbichaima_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Chambremhadhbichaima DROP FOREIGN KEY FK_C509E4FF63DBB69');
        $this->addSql('DROP INDEX IDX_C509E4FF63DBB69 ON Chambremhadhbichaima');
        $this->addSql('ALTER TABLE Chambremhadhbichaima DROP Hospitalmhadhbichaima_id');
    }
}
