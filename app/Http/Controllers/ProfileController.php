<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date_of_birth' => 'nullable|date',
            'national_id' => 'nullable|string|max:20',
            'address_country' => 'nullable|string|max:255',
            'address_province' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_near_landmark' => 'nullable|string|max:255',
            'mastercard_number' => 'nullable|string|max:20',
        ]);
        $user->update($validated);
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
