<?php


use Phinx\Migration\AbstractMigration;

class Report extends AbstractMigration {
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
		$cascades = [ 'delete' => 'SET_NULL', 'update' => 'CASCADE' ];
		$table = $this->table( 'report' );
		$table
			->addColumn( 'statement_id', 'integer', [ 'null' => true ] )
			->addIndex( 'statement_id' )
			->addForeignKey( 'statement_id', 'statement', 'id', $cascades )
			->addColumn( 'user_id', 'integer', [ 'null' => true ] )
			->addIndex( 'user_id' )
			->addForeignKey( 'user_id', 'user', 'id', $cascades )
			->addColumn( 'admin_id', 'integer', [ 'null' => true ] )
			->addIndex( 'admin_id' )
			->addForeignKey( 'admin_id', 'user', 'id', $cascades )
			->create();
	}
}
