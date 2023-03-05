<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230305165602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hotel_ventajas (hotel_id INT NOT NULL, ventajas_id INT NOT NULL, INDEX IDX_D96E7A9B3243BB18 (hotel_id), INDEX IDX_D96E7A9B361305F4 (ventajas_id), PRIMARY KEY(hotel_id, ventajas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventajas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hotel_ventajas ADD CONSTRAINT FK_D96E7A9B3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotel_ventajas ADD CONSTRAINT FK_D96E7A9B361305F4 FOREIGN KEY (ventajas_id) REFERENCES ventajas (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel_ventajas DROP FOREIGN KEY FK_D96E7A9B3243BB18');
        $this->addSql('ALTER TABLE hotel_ventajas DROP FOREIGN KEY FK_D96E7A9B361305F4');
        $this->addSql('DROP TABLE hotel_ventajas');
        $this->addSql('DROP TABLE ventajas');
    }
}
