<?php

use Illuminate\Http\JsonResponse;

/**
 * Exception DB message function
 *
 * @return JsonResponse
 */
function exceptionDbMessage(): JsonResponse
{
    return response()->json(["Message" => "Foi encontrada uma exceção na base de dados, se persistir, contate o ADM do sistema."]);
}

/**
 * Value not numeric message function
 *
 * @param $id
 * @return JsonResponse
 */
function noNumericalMessage($id): JsonResponse
{
    return response()->json(["Message" => "O parâmetro '{$id}' deve ser numérico!"]);
}

/**
 * No value message function
 *
 * @return JsonResponse
 */
function noValuesMessage(): JsonResponse
{
    return response()->json(["Message" => "Não há valores para exibir!"]);
}

/**
 * No create message function
 *
 * @return JsonResponse
 */
function noCreateMessage(): JsonResponse
{
    return response()->json(["Message" => "Houve um erro no registro!"]);
}

/**
 * Create message function
 *
 * @return JsonResponse
 */
function okCreateMessage(): JsonResponse
{
    return response()->json(["Message" => "Cadastrado com sucesso!"]);
}

/**
 * No update message function
 *
 * @return JsonResponse
 */
function noUpdateMessage(): JsonResponse
{
    return response()->json(["Message" => "Houve um erro para editar as informações!"]);
}

/**
 * Update message function
 *
 * @return JsonResponse
 */
function okUpdateMessage(): JsonResponse
{
    return response()->json(["Message" => "Informações atualizadas com sucesso!"]);
}

/**
 * No delete message function
 *
 * @return JsonResponse
 */
function noDeleteMessage(): JsonResponse
{
    return response()->json(["Message" => "Houve um erro para remover o registro!"]);
}

/**
 * Delete message function
 *
 * @return JsonResponse
 */
function okDeleteMessage(): JsonResponse
{
    return response()->json(["message" => "Registro removido com sucesso!"]);
}
