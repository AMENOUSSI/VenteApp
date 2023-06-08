<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LogUserRequest;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(RegisterUser $request)
    {
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;

            $user->password = Hash::make($request->password,['rounds' => 12]);
            $user->save();

            return response()->json([
                'status_code' => 422,
                'status_message' => "L'utilisateur a été enregistré avec succès",
                'user' => $user
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }


    }

    public function login(LogUserRequest $request)
    {
        if(auth()->attempt($request->only(['email','password']))){
    //
        }else {
    //
    return response()->json([
        'status_code' => 403,
        'status_message' => 'Information non valide.',
    ]);
}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
