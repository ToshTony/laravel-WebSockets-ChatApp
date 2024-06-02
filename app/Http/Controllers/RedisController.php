<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function testConnection()
    {
        try {
            // Attempt to establish a connection to Redis
            $connection = Redis::connection();
            
            // If connection successful, ping the Redis server
            $response = $connection->ping();

            // If ping is successful, Redis server is reachable
            if ($response === '+PONG') {
                return 'Connection to Redis server is successful!';
            } else {
                return 'Failed to ping Redis server. Connection might not be established.';
            }
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
