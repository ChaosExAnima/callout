<?php


use Phinx\Migration\AbstractMigration;

class Statement extends AbstractMigration {
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
		$table = $this->table( 'statement' );
		$table
			->addColumn( 'text', 'text' )
			->addColumn( 'state', 'string' )
			->addIndex( 'state' )
			->addColumn( 'user_id', 'integer' )
			->addIndex( 'user_id' )
			->addColumn( 'event_id', 'integer', [ 'null' => true ] )
			->addIndex( 'event_id' )
			->addTimestamps( 'created', 'updated' )
			->addColumn( 'metadata', 'json' )
			->addColumn( 'hide_user', 'boolean' )
			->addColumn( 'reports', 'integer', [ 'limit' => 2 ] )
			->create();
	}
}
