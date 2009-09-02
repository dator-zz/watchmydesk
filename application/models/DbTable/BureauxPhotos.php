<?php
class Model_DbTable_BureauxPhotos extends Zend_Db_Table
{
    protected $_name = 'bureaux_photos';
    protected $_primary = 'id';
    
    protected $_referenceMap = array(
        'Bureaux' => array(
	        'columns'           => 'bureau_id',
	        'refTableClass'     => 'Model_DbTable_Bureaux',
        ),
        'Photos' => array(
	        'columns'           => 'photo_id',
	        'refTableClass'     => 'Model_DbTable_Photos',
        )
    );
	
}
?>