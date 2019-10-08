<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007175951 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cities_tariffs DROP FOREIGN KEY FK_7E10B82FCAC75398');
        $this->addSql('ALTER TABLE cities_tariffs DROP FOREIGN KEY FK_7E10B82F8F3E3A52');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE cities_tariffs');
        $this->addSql('DROP TABLE tariffs');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(30) NOT NULL, ADD surname VARCHAR(30) NOT NULL, ADD created_at DATETIME NOT NULL, ADD verification_code INT DEFAULT NULL, ADD verified TINYINT(1) NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE name name VARCHAR(30) DEFAULT NULL, CHANGE surname surname VARCHAR(30) DEFAULT NULL, CHANGE verification_code verification_code INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, origin VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cities_tariffs (cities_id INT NOT NULL, tariffs_id INT NOT NULL, INDEX IDX_7E10B82F8F3E3A52 (tariffs_id), INDEX IDX_7E10B82FCAC75398 (cities_id), PRIMARY KEY(cities_id, tariffs_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tariffs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, price INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cities_tariffs ADD CONSTRAINT FK_7E10B82F8F3E3A52 FOREIGN KEY (tariffs_id) REFERENCES tariffs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cities_tariffs ADD CONSTRAINT FK_7E10B82FCAC75398 FOREIGN KEY (cities_id) REFERENCES cities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP name, DROP surname, DROP created_at, DROP verification_code, DROP verified, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE users CHANGE name name VARCHAR(30) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE surname surname VARCHAR(30) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE verification_code verification_code INT DEFAULT NULL');
    }
}
