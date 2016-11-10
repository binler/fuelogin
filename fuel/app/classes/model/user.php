<?php

class Model_User extends Orm\Model {

    protected static $_properties = array(
        'id_user',
        'name',
        'login_id',
        'password',
        'email'
    );

    protected static $_primary_key = array('id_user');

    protected static $_table_name = 'tbl_user';

    public static function getInfo(){
    	$query = DB::select()->from('tbl_infomation')->execute();
    	$result_array = $query->as_array();
    	foreach ($result_array as $item) {
    		if($item['class'] == 1)
    		{
    			$result['info'] = $item['info'];
    		}
    		else if ($item['class'] == 2)
    		{
    			$result['maintenance'] = $item['info'];
     		}
    	}
    	return $result;
    }

}
