<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
               
        if ($user) {
            $user->update([
                'name' => $request->name,
                'paternal' => $request->paternal,
                'maternal' => $request->maternal,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return redirect()->route('login');
        } else {
            // Handle user not found scenario (optional)
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //elimina la cuenta y se redirecciona al login
        $user = User::find(auth()->user()->id);
        if ($user) {
            $user->delete();
            Auth::logout();
            return redirect()->route('login');
        } else {
            // Handle user not found scenario (optional)
            return redirect()->back()->withErrors(['error' => 'User not found']);
        }
    }
}
