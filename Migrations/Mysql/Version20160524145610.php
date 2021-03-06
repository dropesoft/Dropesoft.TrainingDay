<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20160524145610 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE dropesoft_trainingday_domain_model_trainingday DROP FOREIGN KEY FK_2071D0BD7002AD59");
		$this->addSql("DROP INDEX idx_2071d0bd7002ad59 ON dropesoft_trainingday_domain_model_trainingday");
		$this->addSql("CREATE INDEX IDX_2071D0BDA8F35CE ON dropesoft_trainingday_domain_model_trainingday (trainingplan)");
		$this->addSql("ALTER TABLE dropesoft_trainingday_domain_model_trainingday ADD CONSTRAINT FK_2071D0BD7002AD59 FOREIGN KEY (trainingplan) REFERENCES dropesoft_trainingday_domain_model_trainingplan (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE dropesoft_trainingday_domain_model_trainingday DROP FOREIGN KEY FK_2071D0BDA8F35CE");
		$this->addSql("DROP INDEX idx_2071d0bda8f35ce ON dropesoft_trainingday_domain_model_trainingday");
		$this->addSql("CREATE INDEX IDX_2071D0BD7002AD59 ON dropesoft_trainingday_domain_model_trainingday (trainingplan)");
		$this->addSql("ALTER TABLE dropesoft_trainingday_domain_model_trainingday ADD CONSTRAINT FK_2071D0BDA8F35CE FOREIGN KEY (trainingplan) REFERENCES dropesoft_trainingday_domain_model_trainingplan (persistence_object_identifier)");
	}
}
