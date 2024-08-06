<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'phone_number' => $request->phone_number,
            'country_id' => '128',
            'city_id' => $request->city,
            'area_id' => $request->area,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ])->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

}
