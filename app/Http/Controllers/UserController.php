<?php

namespace App\Http\Controllers;

use App\Policies\UsersPolicy;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view', User::class);
        // $users = User::all();
        return Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $this->authorize('viewAny', User::class);
        $users = User::find($user);
        return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->authorize('update', User::class);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->User_Nom_Societe = $request->User_Nom_Societe;
        $user->User_Identifiant_Fiscale = $request->User_Identifiant_Fiscale;
        $user->User_Identifiant_Commun_Entreprise = $request->User_Identifiant_Commun_Entreprise;
        $user->User_Taxe_Professionnele = $request->User_Taxe_Professionnele;
        $user->User_Code_Postal = $request->User_Code_Postal;
        $user->User_Ville = $request->User_Ville;
        $user->User_Site_Internet = $request->User_Site_Internet;
        $user->save();
        return $user;






        // $users = User::find($user)->first();
        // $users->name = $request->name;
        // $users->email = $request->email;
        // $users->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $this->authorize('delete', User::class);

        $users = User::find($id);

        // dd($users);
        if ($users->id != Auth::user()->id) {
            return ["you can't delete this user."];
        }

        $users->markDeleted();

        $this->logoff($request->token);

        return ['Deleted'];
    }

    public function logoff($token)
    {
        try {
            JWTAuth::invalidate($token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function updatePassowrd(Request $request)
    {
        // check if it's the same email .
        if (Auth::user()->email != $request->email) {
            return ["not the same email"];
        }

        $user = User::find(Auth::user()->id);

        // check if it's the same password .
        if (!$user->verifyPassword($request->oldPassword, $request->comfirmOldPassword)) {
            return ['not the same password'];
        }

        $user->updatePassword($request);

        return $user;
    }
}
