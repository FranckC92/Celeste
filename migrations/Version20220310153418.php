<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310153418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD commentaire_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515FAC8564B FOREIGN KEY (commentaire_id_id) REFERENCES commentaire (id)');
        $this->addSql('CREATE INDEX IDX_B8755515FAC8564B ON activite (commentaire_id_id)');
        $this->addSql('ALTER TABLE commentaire ADD parent_id_id INT DEFAULT NULL, ADD commentaire VARCHAR(36) NOT NULL, ADD commentaire_id VARCHAR(36) NOT NULL, ADD oneto_many VARCHAR(36) DEFAULT NULL, ADD slug VARCHAR(50) NOT NULL, ADD auteur VARCHAR(50) NOT NULL, ADD contenu VARCHAR(250) NOT NULL, ADD date_creation DATETIME NOT NULL, ADD date_modification DATETIME NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB3750AF4 FOREIGN KEY (parent_id_id) REFERENCES commentaire (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCB3750AF4 ON commentaire (parent_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515FAC8564B');
        $this->addSql('DROP INDEX IDX_B8755515FAC8564B ON activite');
        $this->addSql('ALTER TABLE activite DROP commentaire_id_id, CHANGE activite_id activite_id VARCHAR(36) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titre titre VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(250) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB3750AF4');
        $this->addSql('DROP INDEX IDX_67F068BCB3750AF4 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP parent_id_id, DROP commentaire, DROP commentaire_id, DROP oneto_many, DROP slug, DROP auteur, DROP contenu, DROP date_creation, DROP date_modification');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
