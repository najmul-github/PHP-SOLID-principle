<?php

use PHPUnit\Framework\TestCase;

class ResponseStructureTest extends TestCase
{   
    protected $expectedResponse;

    protected function setUp(): void {
        parent::setUp();

        // Load the expected response
        $this->expectedResponse = require('testdata/ExpectedResponse.php');
    }

    public function testResponseStructure()
    {
        // Get the actual JSON response
        $actualResponse = json_decode($this->getResponse(), true);

        // Assert that the response structure matches the expected structure
        $this->assertEquals($this->expectedResponse, $actualResponse);
    }

    public function getResponse()
    {
        // local URL to fetch the JSON response
        $url = 'http://localhost/php-solid-principle/index.php';
    
        // file_get_contents to retrieve the JSON response
        $response = file_get_contents($url);
    
        // Checking the response was successfully fetched!
        if ($response === false) {
            // Handle errors here
            echo 'Failed to fetch the JSON response.';
        }
    
        return $response;
    }
    
}

?>