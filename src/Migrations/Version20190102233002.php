<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190102233002 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_9474526CFEC530A9 ON comment');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8D2B36786B ON post');
        $this->addSql('ALTER TABLE post ADD date VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD description2 LONGTEXT DEFAULT NULL, CHANGE name name TINYTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE UNIQUE INDEX UNIQ_9474526CFEC530A9 ON comment (content)');
        $this->addSql('ALTER TABLE post DROP date');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D2B36786B ON post (title)');
        $this->addSql('ALTER TABLE user DROP description2, CHANGE name name VARCHAR(40) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
