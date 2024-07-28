<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Api\Signature as SignatureModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Exception;

class Signature extends Controller
{
    private SignatureModel $signature;
    private Request $request;

    /**
     * @param SignatureModel $signature
     */
    public function __construct(SignatureModel $signature, Request $request)
    {
        $this->signature = $signature;
        $this->request = $request;
    }

    /**
     * Return all signatures
     *
     * @return LengthAwarePaginator|JsonResponse
     */
    public function getAllSignatures(): LengthAwarePaginator|JsonResponse
    {
        try {
            return $this->signature->query()->paginate(5);
        } catch (\Exception) {
            return exceptionDbMessage();
        }
    }

    /**
     * Return signature by id
     *
     * @param $id
     * @return JsonResponse
     */
    public function getSignatureById($id): JsonResponse
    {
        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        try {
            $signatureById = $this->signature->query()
                ->where('id', '=', $id)
                ->get();
        } catch (\Exception) {
            return exceptionDbMessage();
        }

        if (!$signatureById) {
            return noValuesMessage();
        }

        return response()->json($signatureById);
    }

    /**
     * Create new signature
     *
     * @return JsonResponse|MessageBag
     */
    public function createSignature(): JsonResponse | MessageBag
    {
        $validator = Validator::make($this->request->all(),
            [
                'register' => 'required|numeric',
                'description' => 'required|string',
                'price' => 'required|between:0,99.99',
                'status' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $createSignature = $this->signature->create($this->request->all());
        } catch (\Exception){
            return exceptionDbMessage();
        }

        if (!$createSignature){
            return noCreateMessage();
        }

        return okCreateMessage();
    }

    /**
     * Update data signature
     *
     * @param $id
     * @return JsonResponse|MessageBag
     */
    public function updateSignature($id): JsonResponse | MessageBag
    {
        $data = $this->request->post();

        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        $validator = Validator::make($this->request->all(),
            [
                'register' => 'required|numeric',
                'description' => 'required|string',
                'price' => 'required|between:0,99.99',
                'status' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $updateSignature = $this->signature::query()
                ->where('id', '=', $id)
                ->update([
                    'register' => $data['register'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'status' => $data['status']
                ]);
        }catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$updateSignature){
            return noUpdateMessage();
        }

        return okUpdateMessage();
    }

    /**
     * Remove signature
     *
     * @param $id
     * @return JsonResponse
     */
    public function deleteSignature($id): JsonResponse
    {
        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        try {
            $deleteSignature = $this->signature->query()
                ->where('id', '=', $id)
                ->delete();
        } catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$deleteSignature){
            return noDeleteMessage();
        }

        return okDeleteMessage();
    }
}
