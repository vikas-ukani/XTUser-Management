<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * User Fetching Process
     *
     * @return void
     */
    public function getUsers()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    /**
     * User Searching Process
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the name, username, email, mobile fields from users.
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('username', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('mobile', 'LIKE', "%{$search}%")
            ->get();

        // Return the dashboard view with the searched users
        return view('dashboard', compact('users', 'search'));
    }

    /**
     * User Showing Process
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('users.show', compact(
            'user',
            'countries',
            'states',
            'cities'
        ));
    }

    /**
     * User Edit Process
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('users.edit', compact(
            'user',
            'countries',
            'states',
            'cities'
        ));
    }

    /**
     * User Update Process
     *
     * @param User $user
     * @param UserUpdateRequest $request
     * @return void
     */
    public function update(User $user, UserUpdateRequest $request)
    {
        $input = $request->validated();
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

        /** Updating Users */
        $user = User::where('id', $user->id)->update($input);
        // dd('asd', $input);

        return redirect()->route('dashboard');
    }

    /**
     * User Delete Process
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard');
    }
}
