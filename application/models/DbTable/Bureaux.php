<?php
class Model_DbTable_Bureaux extends Zend_Db_Table
{
    protected $_name = 'bureaux';
    protected $_primary = 'id';
    
    protected $_referenceMap = array(
    	'Membre' => array(
    		'columns'		=> 'membre_id',
    		'refTableClass' => 'Model_DbTable_Membres'
    	),
    	'Commentaires' => array(
    		'columns'		=> 'id',
    		'refTableClass' => 'Model_DbTable_Commentaires'	
    	)
    );
}
?>