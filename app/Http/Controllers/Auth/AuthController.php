<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Login Process
     *
     * @param LoginUserRequest $request
     * @return void
     */
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return back()->with('error', __('Invalid Credentials...'));
        }
        return redirect()->route('dashboard');
    }


    /**
     * Register View
     *
     * @return void
     */
    public function registerView()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('register', compact(
            'countries',
            'states',
            'cities'
        ));
    }

    /**
     * Registraton Process
     *
     * @param RegisterUserRequest $request
     * @return void
     */
    public function register(RegisterUserRequest $request)
    {
        $input = $request->all();

        /** checking for file uploading... */
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path() . '/images';

            /** file moving */
            if (!file_exists($path)) {
                if (\File::makeDirectory($path, 0755, true)) {
                }
            }
            Storage::disk('public')->put($filename, file_get_contents($image));
            $image->move($path, $filename);
            $input['profile_image'] = $filename;
        }

        /** creating user */
        $user = User::create($input);
        Auth::login($user);
        return redirect()->route('dashboard');
    }


    /**
     * Logout Process
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
