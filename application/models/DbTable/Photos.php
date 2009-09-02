<?php
class Model_DbTable_Photos extends Zend_Db_Table
{
    protected $_name = 'photos';
    protected $_primary = 'id';
    
    protected $_referenceMap = array(
        'Bureaux' => array(
	        'columns'           => 'id',
	        'refTableClass'     => 'Model_DbTable_Bureaux',
        )
    );
	
}
?>