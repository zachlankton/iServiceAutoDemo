<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210912152707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE mechanic_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_ticket_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE mechanic (id INT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE service_ticket (id INT NOT NULL, vehicle_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, ticket_no VARCHAR(255) DEFAULT NULL, date_received DATE NOT NULL, work_performed TEXT NOT NULL, comments TEXT DEFAULT NULL, date_completed DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A967A895545317D1 ON service_ticket (vehicle_id)');
        $this->addSql('CREATE INDEX IDX_A967A8959395C3F3 ON service_ticket (customer_id)');
        $this->addSql('ALTER TABLE service_ticket ADD CONSTRAINT FK_A967A895545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_ticket ADD CONSTRAINT FK_A967A8959395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE mechanic_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_ticket_id_seq CASCADE');
        $this->addSql('DROP TABLE mechanic');
        $this->addSql('DROP TABLE service_ticket');
    }
}
