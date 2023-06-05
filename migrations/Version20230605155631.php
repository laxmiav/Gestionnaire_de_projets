<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605155631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projets (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, starting_date DATE DEFAULT NULL, deadline_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets_user (projets_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B7E8CA9597A6CB7 (projets_id), INDEX IDX_B7E8CA9A76ED395 (user_id), PRIMARY KEY(projets_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projets_user ADD CONSTRAINT FK_B7E8CA9597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_user ADD CONSTRAINT FK_B7E8CA9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projets_user DROP FOREIGN KEY FK_B7E8CA9597A6CB7');
        $this->addSql('ALTER TABLE projets_user DROP FOREIGN KEY FK_B7E8CA9A76ED395');
        $this->addSql('DROP TABLE projets');
        $this->addSql('DROP TABLE projets_user');
    }
}
