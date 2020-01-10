<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200110135053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postalcode VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charity_purchase (charity_id INT NOT NULL, purchase_id INT NOT NULL, INDEX IDX_E27D059BF5C97E37 (charity_id), INDEX IDX_E27D059B558FBEB9 (purchase_id), PRIMARY KEY(charity_id, purchase_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_665648E94584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color_purchase (color_id INT NOT NULL, purchase_id INT NOT NULL, INDEX IDX_BD924A797ADA1FB5 (color_id), INDEX IDX_BD924A79558FBEB9 (purchase_id), PRIMARY KEY(color_id, purchase_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, sex INT NOT NULL, phone VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, UNIQUE INDEX UNIQ_CB893157A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, quantity INT NOT NULL, size VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE purchase (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, quantity INT NOT NULL, size VARCHAR(5) NOT NULL, INDEX IDX_6117D13BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE charity_purchase ADD CONSTRAINT FK_E27D059BF5C97E37 FOREIGN KEY (charity_id) REFERENCES charity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE charity_purchase ADD CONSTRAINT FK_E27D059B558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E94584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE color_purchase ADD CONSTRAINT FK_BD924A797ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE color_purchase ADD CONSTRAINT FK_BD924A79558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE info ADD CONSTRAINT FK_CB893157A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE charity_purchase DROP FOREIGN KEY FK_E27D059BF5C97E37');
        $this->addSql('ALTER TABLE color_purchase DROP FOREIGN KEY FK_BD924A797ADA1FB5');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E94584665A');
        $this->addSql('ALTER TABLE charity_purchase DROP FOREIGN KEY FK_E27D059B558FBEB9');
        $this->addSql('ALTER TABLE color_purchase DROP FOREIGN KEY FK_BD924A79558FBEB9');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE info DROP FOREIGN KEY FK_CB893157A76ED395');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13BA76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE charity');
        $this->addSql('DROP TABLE charity_purchase');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE color_purchase');
        $this->addSql('DROP TABLE info');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE purchase');
        $this->addSql('DROP TABLE user');
    }
}
