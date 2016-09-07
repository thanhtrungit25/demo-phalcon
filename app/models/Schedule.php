<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Schedule extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $user_id;

    /**
     *
     * @var string
     * @Column(type="string", length=80, nullable=false)
     */
    public $address_start;

    /**
     *
     * @var string
     * @Column(type="string", length=80, nullable=false)
     */
    public $address_end;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    public $lat_start_x;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    public $lng_start_y;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    public $lat_end_x;

    /**
     *
     * @var double
     * @Column(type="double", length=10, nullable=false)
     */
    public $lng_end_y;

    public $distance_start;

    public function afterFetch()
    {
        // Convert the string to an array
        $this->address_start = explode(',', $this->address_start);

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'schedule';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Schedule[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Schedule
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function initialize()
    {
        $this->belongsTo('user_id', 'Users', 'id');
    }

    public static function findScheduleByAddress($params = null)
    {
        // var_dump($params);die;
        // $query = new Query("SELECT * FROM Schedule", $this->getDI());

        $sql = "
            SELECT id,
            ( 6371
                * acos( cos( radians(?) ) 
                * cos( radians( lat_start_x ) ) 
                * cos( radians( lng_start_y ) - radians(?) ) 
                + sin( radians(?) ) 
                * sin( radians( lat_start_x ) ) ) 
            ) AS distance_start
            FROM schedule WHERE distance_start < 20";

        $schedule = new Schedule();

        // Execute the query
        return new Resultset(null, $schedule, $schedule->getReadConnection()->query($sql, $params));

    }

}
