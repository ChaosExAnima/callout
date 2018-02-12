<?php


use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration {
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
		$table = $this->table( 'user' );
		$table
			->addColumn( 'name', 'string' )
			->addIndex( 'name', [ 'unique' => true ] )
			->addColumn( 'password', 'string' )
			->addIndex( 'password' )
			->addColumn( 'email', 'string', [ 'null' => true ] )
			->addIndex( 'email', [ 'unique' => true ] )
			->addTimestamps( 'created', 'updated' )
			->addColumn( 'banned', 'boolean' )
			->addColumn( 'role', 'string' )
			->addIndex( 'role' )
			->addColumn( 'metadata', 'json' )
			->create();

		$cascades = [ 'delete' => 'RESTRICT', 'update' => 'CASCADE' ];
		$this->table( 'statement' )
			->addForeignKey( 'user_id', 'user', 'id', $cascades )
			->addForeignKey( 'event_id', 'event', 'id', $cascades )
			->update();
	}
}
