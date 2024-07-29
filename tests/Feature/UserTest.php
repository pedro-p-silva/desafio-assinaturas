<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Return all users.
     */
    public function test_the_return_of_all_users(): void
    {
        $response = $this->get('api/users');

        $response->assertStatus(200);
    }

    /***
     * Return the user by id
     */
    public function test_returns_the_user_by_id(): void
    {
        $response = $this->get('api/users/1');

        $response->assertStatus(200);
    }

    /***
     * Create a new user
     */
    public function test_user_create(): void
    {
        $data = [
            "name" => "User Teste",
            "email" => "teste@gmail.com.br",
            "phone" => "1199994444",
            "password" => "1234567",
            "status" => 1
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST', 'api/users', $data);

        $response->assertStatus(200);
    }

    /***
     * Update user
     */
    public function test_user_update(): void
    {
        $data = [
            "name" => "User Teste",
            "email" => "elinor68@example.com",
            "phone" => "1199994444",
            "password" => "1234567",
            "status" => 1
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('PUT', 'api/users/2', $data);

        $response->assertStatus(200);
    }

    /***
     * Delete user
     */
    public function test_user_delete(): void
    {
        $response = $this->delete('api/users/2');

        $response->assertStatus(200);
    }
}
