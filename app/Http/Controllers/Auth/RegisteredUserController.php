<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'gender' => ['required', 'in:male,female,rather-not-say'],
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['required', 'string'],
            'city' => ['required'],
            'area' => ['required'],
            'address' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password),
        ])->assignRole('user');

        $address = new Address;
        $address->name = $user->name;
        $address->user_id = $user->id;
        $address->phone_number = $request->phone_number;
        $address->email = $user->email;
        $address->country_id = '128';
        $address->city_id = $request->city;
        $address->area_id = $request->area;
        $address->street_address = $request->address;
        $address->is_default = true;
        $address->is_pickup = true;
        $address->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
