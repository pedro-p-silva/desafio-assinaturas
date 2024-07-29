<?php

namespace Tests\Feature;

use Tests\TestCase;

class InvoiceTest extends TestCase
{
    /**
     * Return all invoices.
     */
    public function test_the_return_of_all_invoices(): void
    {
        $response = $this->get('api/invoices');

        $response->assertStatus(200);
    }

    /***
     * Return the invoice by id
     */
    public function test_returns_the_invoice_by_id(): void
    {
        $response = $this->get('api/invoices/1');

        $response->assertStatus(200);
    }

    /***
     * Create a new invoice
     */
    public function test_invoice_create(): void
    {
        $data = [
            "register" => 3,
            "signature" => 2,
            "description" => "Test invoice",
            "due_date" => "2024-08-08",
            "price" => 7777.00
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('POST', 'api/invoices', $data);

        $response->assertStatus(200);
    }

    /***
     * Update invoice
     */
    public function test_signature_update(): void
    {
        $data = [
            "register" => 3,
            "signature" => 2,
            "description" => "Test invoice",
            "due_date" => "2024-08-08",
            "price" => 7777.00
        ];

        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
        ])->json('PUT', 'api/invoices/2', $data);

        $response->assertStatus(200);
    }

    /***
     * Delete invoice
     */
    public function test_invoice_delete(): void
    {
        $response = $this->delete('api/invoices/2');

        $response->assertStatus(200);
    }
}
