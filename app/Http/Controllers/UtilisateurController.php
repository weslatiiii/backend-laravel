<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|unique:utilisateurs',
            'password' => 'required|string',
            'fullname' => 'required|string',
        ]);

        $data['password'] = bcrypt($data['password']);

        $utilisateur = Utilisateur::create($data);

        return response()->json($utilisateur);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'username' => 'string|unique:utilisateurs,username,' . $id,
            'password' => 'string',
            'fullname' => 'string',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update($data);

        return response()->json($utilisateur);
    }

    public function delete($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return response()->json(['message' => 'Utilisateur deleted successfully']);
    }

    public function activate($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update(['active' => true]);

        return response()->json(['message' => 'Utilisateur activated successfully']);
    }

    public function deactivate($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->update(['active' => false]);

        return response()->json(['message' => 'Utilisateur deactivated successfully']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->token()->revoke();

        return response()->json(['message' => 'Logout successful']);
    }
}
