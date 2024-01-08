<?php

declare(strict_types=1);

namespace Pimcore\Bundle\CoreBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108140115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'add date to enum for properties';
    }

    public function up(Schema $schema): void
    {
        if ($schema->hasTable('properties')) {
            // Make sure the 'type' enum does not contain 'date'
            $this->addSql("ALTER TABLE properties MODIFY COLUMN type ENUM('text','document','asset','object','bool','select')");
            // Add 'date' to the 'type' enum
            $this->addSql("ALTER TABLE properties MODIFY COLUMN type ENUM('text','document','asset','object','bool','select','date')");
        }
    }

    public function down(Schema $schema): void
    {
        // Remove 'date' from the 'type' enum
        $this->addSql("ALTER TABLE properties MODIFY COLUMN type ENUM('text','document','asset','object','bool','select')");
    }
}
