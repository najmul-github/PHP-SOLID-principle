<?php

namespace Services;

use Exceptions\ApiDataNotFoundException;
use Illuminate\Database\Capsule\Manager as DB;
use Repositories\ResponseRepository;

class DatabaseService 
{
    protected $connection;

    public function __construct()
    {
        // $this->connection = $this->createConnection();
        
        $this->connection = self::createConnection();
    }

    public static function createConnection() {
        $response = new ResponseRepository();
        try {
            $db = new DB;
            $db->addConnection([
                'driver'    => DB_CONNECTION,
                'host'      => DB_HOST,
                'database'  => DB_DATABASE,
                'username'  => DB_USERNAME,
                'password'  => DB_PASSWORD,
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);
            $db->setAsGlobal();
            // $db->bootEloquent();

            return $db->getConnection();
        } catch (\Exception $e) {
            // Handle the exception, log it, and potentially throw a custom DatabaseException
            // return $response->error($e->getCoyde(),$e->getMessage());
            throw new ApiDataNotFoundException("Database connection error: " . $e->getMessage(), $e->getCode());
        }
    }

    public function connect() 
    {
        return $this->connection;
    }
}

?>