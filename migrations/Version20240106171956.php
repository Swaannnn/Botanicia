<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106171956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Creation de l'administateur
        $this->addSql("INSERT INTO shopping_cart VALUES ()");

        $password = password_hash("Bot@nici@", PASSWORD_ARGON2ID);
        $roles = ["ROLE_ADMIN"]; // Vos rôles
        $rolesJSON = json_encode($roles);

        $this->addSql("INSERT INTO user 
    (email, roles, password, last_name, first_name, phone_number, shopping_cart_id)
    VALUES
    ('admin@botanicia.com', '$rolesJSON', '$password', 'Admin', 'Admin', NULL, 1)");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
