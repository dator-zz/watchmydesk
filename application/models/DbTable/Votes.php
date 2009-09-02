<?php
class Model_DbTable_Votes extends Zend_Db_Table
{
    protected $_name = 'votes';
    protected $_primary = 'id';
    
    protected $_referenceMap = array(
        'Membres' => array(
	        'columns'           => 'membre_id',
	        'refTableClass'     => 'Model_DbTable_Membres',
        ),
        'Bureaux' => array(
	        'columns'           => 'bureau_id',
	        'refTableClass'     => 'Model_DbTable_Bureaux',
        )
    );
	
}
?>