<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class QueryTest extends TestCase
{
    const URL = '/api/queries';
    const HEADER = [
        'Content-Type' => 'application/json'
    ];

    /**
     * Test case of saving user with valid params
     * @dataProvider \Tests\Feature\DataProvider\QueryDataProvider::GetResponseWithValidParams
     * @return void
     */
    public function test_response_when_parameter_is_valid
    (
        array $aParameter, 
        array $aHttpFake, 
        array $aExpected
    ) {
        // Arrange
        Http::fake([
            '*' => Http::response(
                $aHttpFake, 
                Response::HTTP_OK, 
                self::HEADER
            )
        ]);

        // Act
        $oResponse = $this->json('GET', self::URL, $aParameter);

        //Assert
        $oResponse->assertStatus(200);
        $oResponse->assertJson($aExpected);
    }


    
    /**
     * Test case of saving user with valid params
     * @dataProvider \Tests\Feature\DataProvider\QueryDataProvider::GetResponseWithInvalidParams
     * @return void
     */
    public function test_response_when_parameter_is_invalid
    (
        array $aParameter, 
        array $aExpected
    ) {
        //Act
        $oResponse = $this->json('GET', self::URL, $aParameter);

        //Assert
        $oResponse->assertStatus(422);
        $oResponse->assertJsonValidationErrors($aExpected['key']);
        $oResponse->assertJsonFragment($aExpected['message']);
    }
}
