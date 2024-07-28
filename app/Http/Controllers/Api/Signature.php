<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Api\Signature as SignatureModel;
use Illuminate\Pagination\LengthAwarePaginator;

class Signature extends Controller
{
    private SignatureModel $signature;

    /**
     * @param SignatureModel $signature
     */
    public function __construct(SignatureModel $signature)
    {
        $this->signature = $signature;
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
            return exceptionMessageDB();
        }
    }
}
