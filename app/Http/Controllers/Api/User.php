<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Api\User as UserModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Exception;

class User extends Controller
{
    private UserModel $user;
    private Request $request;

    /**
     * @param UserModel $user
     * @param Request $request
     */
    public function __construct(UserModel $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Return all users
     *
     * @return LengthAwarePaginator|JsonResponse
     */
    public function getAllUsers(): LengthAwarePaginator|JsonResponse
    {
        try {
            return $this->user->query()->paginate(5);
        } catch (Exception) {
            return exceptionDbMessage();
        }
    }

    /**
     * Return user by id
     *
     * @param $id
     * @return JsonResponse
     */
    public function getUserById($id): JsonResponse
    {
        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        try {
            $userById = $this->user->query()
                ->where('id', '=', $id)
                ->get();
        } catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$userById) {
            return noValuesMessage();
        }

        return response()->json($userById);
    }

    /**
     * Create new user
     *
     * @return JsonResponse|MessageBag
     */
    public function createUser(): JsonResponse | MessageBag
    {
        $validator = Validator::make($this->request->all(),
            [
                'name' => 'required|min:5|max:191',
                'email' => 'required|email',
                'phone' => 'required|string',
                'password' => 'required|string',
                'status' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $createUser = $this->user->create($this->request->all());
        } catch (Exception){
            return exceptionDbMessage();
        }

        if (!$createUser){
            return response()->json(["Message" => "Houve um erro para registrar o usuário!"]);
        }

        return response()->json(["Message" => "Usuário criado com sucesso!"]);
    }

    /**
     * Update data user
     *
     * @param $id
     * @return JsonResponse|MessageBag
     */
    public function updateUser($id): JsonResponse | MessageBag
    {
        $data = $this->request->post();

        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        $validator = Validator::make($this->request->all(),
            [
                'name' => 'required|min:5|max:191',
                'email' => 'required|email',
                'phone' => 'required|string',
                'password' => 'required|string',
                'status' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $updateUser = $this->user::query()
                ->where('id', '=', $id)
                ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => Hash::make($data['password']),
                    'status' => $data['status']
                ]);
        }catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$updateUser){
            return noUpdateMessage();
        }

        return okUpdateMessage();
    }

    /**
     * Remove user
     *
     * @param $id
     * @return JsonResponse
     */
    public function deleteUser($id): JsonResponse
    {
        if (!is_numeric($id)) {
            return noNumericalMessage($id);
        }

        try {
            $deleteUser = $this->user->query()
                ->where('id', '=', $id)
                ->delete();
        } catch (Exception) {
            return exceptionDbMessage();
        }

        if (!$deleteUser){
            return noDeleteMessage();
        }

        return okDeleteMessage();
    }
}
