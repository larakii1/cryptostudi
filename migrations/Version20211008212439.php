<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211008212439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE crypto ADD quantity DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE transaction DROP INDEX UNIQ_723705D1E9571A63, ADD INDEX IDX_723705D1E9571A63 (crypto_id)');
        $this->addSql('ALTER TABLE transaction CHANGE crypto_id crypto_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE crypto DROP quantity');
        //$this->addSql('ALTER TABLE transaction DROP INDEX IDX_723705D1E9571A63, ADD UNIQUE INDEX UNIQ_723705D1E9571A63 (crypto_id)');
        //    $this->addSql('ALTER TABLE transaction CHANGE crypto_id crypto_id INT NOT NULL');
    }
}
