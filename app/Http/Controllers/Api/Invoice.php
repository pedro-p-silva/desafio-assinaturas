<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Api\Invoice as InvoiceModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Exception;

class Invoice extends Controller
{
    private InvoiceModel $invoice;
    private Request $request;

    /**
     * @param InvoiceModel $invoice
     * @param Request $request
     */
    public function __construct(InvoiceModel $invoice, Request $request)
    {
        $this->invoice = $invoice;
        $this->request = $request;
    }

    /**
     * Return all invoices
     *
     * @return LengthAwarePaginator|JsonResponse
     */
    public function getAllInvoices(): LengthAwarePaginator|JsonResponse
    {
        try {
            return $this->invoice->query()->paginate(5);
        } catch (Exception) {
            return exceptionDbMessage();
        }
    }

    /**
     * Return invoice by id
     *
     * @param $id
     * @return JsonResponse
     */
    public function getInvoiceById($id): JsonResponse
    {
        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        try {
            $invoiceById = $this->invoice->query()
                ->where('id', '=', $id)
                ->get();
        } catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$invoiceById) {
            return noValuesMessage();
        }

        return response()->json($invoiceById);
    }

    /**
     * Create new invoice
     *
     * @return JsonResponse|MessageBag
     */
    public function createInvoice(): JsonResponse | MessageBag
    {
        $validator = Validator::make($this->request->all(),
            [
                'register' => 'required|numeric',
                'signature' => 'required|numeric',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'price' => 'required|between:0,99.99',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $createInvoice = $this->invoice->create($this->request->all());
        } catch (Exception){
            return exceptionDbMessage();
        }

        if (!$createInvoice){
            return noCreateMessage();
        }

        return okCreateMessage();
    }

    /**
     * Update data invoice
     *
     * @param $id
     * @return JsonResponse|MessageBag
     */
    public function updateInvoice($id): JsonResponse | MessageBag
    {
        $data = $this->request->post();

        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        $validator = Validator::make($this->request->all(),
            [
                'register' => 'required|numeric',
                'signature' => 'required|numeric',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'price' => 'required|between:0,99.99',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $updateInvoice = $this->invoice::query()
                ->where('id', '=', $id)
                ->update([
                    'register' => $data['register'],
                    'signature' => $data['signature'],
                    'description' => $data['description'],
                    'due_date' => $data['due_date'],
                    'price' => $data['price']
                ]);
        }catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$updateInvoice){
            return noUpdateMessage();
        }

        return okUpdateMessage();
    }

    /**
     * Remove invoice
     *
     * @param $id
     * @return JsonResponse
     */
    public function deleteInvoice($id): JsonResponse
    {
        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        try {
            $deleteInvoice = $this->invoice->query()
                ->where('id', '=', $id)
                ->delete();
        } catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$deleteInvoice){
            return noDeleteMessage();
        }

        return okDeleteMessage();
    }
}
