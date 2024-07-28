<?php

use Illuminate\Http\JsonResponse;

/**
 * Exception DB function
 *
 * @return JsonResponse
 */
function exceptionMessageDB(): JsonResponse
{
    return response()->json(["Message" => "Foi encontrada uma exceção na base de dados, se persistir, contate o ADM do sistema."]);
}

/**
 * Value not numeric function
 *
 * @param $id
 * @return JsonResponse
 */
function notNumerical($id): JsonResponse
{
    return response()->json(["Message" => "O parâmetro '{$id}' não é numérico!"]);
}

/**
 * No value function
 *
 * @return JsonResponse
 */
function noValues(): JsonResponse
{
    return response()->json(["Message" => "Não há valores para exibir!"]);
}
