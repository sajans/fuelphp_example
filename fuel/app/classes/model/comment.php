<?php

use Orm\Model;

class Model_Comment extends Model {

    protected static $_properties = array(
        'id',
        'title',
        'message',
        'message_id',
        'created_at',
        'updated_at',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
        ),
    );

    public static function validate($factory) {
        $val = Validation::forge($factory);
        $val->add_field('title', 'Title', 'required|max_length[255]');
        $val->add_field('message', 'Message', 'required');
        $val->add_field('message_id', 'Message Id', 'required|valid_string[numeric]');

        return $val;
    }

}
