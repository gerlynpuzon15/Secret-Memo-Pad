<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Notes;


class ApiController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
        }   

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'User created successfully'], 201);
    }


    public function index(Request $request)
    {
        $userId = $request->query('user_id');

        if (!$userId) {
            return response()->json(['error' => 'User ID is required'], 400);
        }

        $notes = Notes::where('user_id', $userId)->get();

        return response()->json(['notes' => $notes], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'note' => 'required|string',
            'user_id' => 'required|exists:users,id' 
        ]);

        $note = new Notes();
        $note->title = $validatedData['title'];
        $note->note = $validatedData['note'];
        $note->user_id = $validatedData['user_id']; 
        $note->save();

        return response()->json(['message' => 'Note created successfully'], 201);
    }

}
