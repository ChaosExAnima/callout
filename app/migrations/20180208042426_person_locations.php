<?php


use Phinx\Migration\AbstractMigration;

class PersonLocations extends AbstractMigration {
	/**
	 * Change Method.
	 *
	 * Write your reversible migrations using this method.
	 *
	 * More information on writing migrations is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
	 *
	 * The following commands can be used in this method and Phinx will
	 * automatically reverse them when rolling back:
	 *
	 *    createTable
	 *    renameTable
	 *    addColumn
	 *    renameColumn
	 *    addIndex
	 *    addForeignKey
	 *
	 * Remember to call "create()" or "update()" and NOT "save()" when working
	 * with the Table class.
	 */
	public function change() {
		$cascades = [ 'delete' => 'CASCADE', 'update' => 'CASCADE' ];
		$table = $this->table( 'person_location' );
		$table
			->addColumn( 'person_id', 'integer' )
			->addIndex( 'person_id' )
			->addForeignKey( 'person_id', 'person', 'id', $cascades )
			->addColumn( 'location_id', 'integer' )
			->addIndex( 'location_id' )
			->addForeignKey( 'location_id', 'location', 'id', $cascades )
			->create();
	}
}
