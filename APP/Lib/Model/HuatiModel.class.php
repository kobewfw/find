<?php
class HuatiModel extends RelationModel{
	protected $tableName = 'huati';
	public $_link = array(
		'group'=>array(
			'mapping_type'=>BELONGS_TO,
			'foreign_key'=>'gid',
			'as_fields'=>'gname',
		),	
	);
}





?>