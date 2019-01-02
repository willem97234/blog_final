<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190101150958 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id_comment INT AUTO_INCREMENT NOT NULL, username VARCHAR(40) NOT NULL, content VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9474526CFEC530A9 (content), PRIMARY KEY(id_comment)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id_post INT AUTO_INCREMENT NOT NULL, title VARCHAR(40) NOT NULL, content VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5A8A6C8D2B36786B (title), PRIMARY KEY(id_post)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, name VARCHAR(40) NOT NULL, role VARCHAR(50) NOT NULL, password VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE user');
    }
}
