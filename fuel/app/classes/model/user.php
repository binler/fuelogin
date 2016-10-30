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

}
