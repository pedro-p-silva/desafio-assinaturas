<?php

namespace Tests\Feature;

use Tests\TestCase;

class SignatureTest extends TestCase
{
    /**
     * Return all signatures.
     */
    public function test_the_return_of_all_signatures(): void
    {
        $response = $this->get('api/signatures');

        $response->assertStatus(200);
    }

    /***
     * Return the signature by id
     */
    public function test_returns_the_signature_by_id(): void
    {
        $response = $this->get('api/signatures/1');

        $response->assertStatus(200);
    }

    /***
     * Create a new signature
     */
    public function test_signature_create(): void
    {
        $data = [
            "register" => 1,
            "description" => "Teste signature",
            "price" => 7777.00,
            "due_date" => "2024-08-08",
            "status" => 0
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST', 'api/signatures', $data);

        $response->assertStatus(200);
    }

    /***
     * Update signature
     */
    public function test_signature_update(): void
    {
        $data = [
            "register" => 1,
            "description" => "Teste signature",
            "price" => 7777.00,
            "due_date" => "2024-08-08",
            "status" => 0
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('PUT', 'api/signatures/2', $data);

        $response->assertStatus(200);
    }

    /***
     * Delete signature
     */
    public function test_signature_delete(): void
    {
        $response = $this->delete('api/signatures/2');

        $response->assertStatus(200);
    }
}
