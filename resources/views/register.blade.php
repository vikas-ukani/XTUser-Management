@extends('layouts.main')
@section('title') User Registration | @env('APP_NAME') @endenv @stop()

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="row  ">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <h2 class="mt-5 mb-4">Registration Here</h2>
                        <form action={{ route('register') }} method="post" enctype="multipart/form-data">
                            @csrf
                            @include('form.messages')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter your name" />
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username </label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter your username" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="name@example.com" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="*******" />
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" placeholder="*******" />
                            </div>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="number" name="mobile" class="form-control" id="mobile"
                                    placeholder="Enter mobile number" />
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Image</label>
                                <input type="file" name="profile_image" class="form-control" id="profile_image"
                                    accept=".jpg,.gif" />
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" />
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Date of Birth</label>
                                <textarea name="address" id="address" cols="30" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Country:</label>
                                <select name="country_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''> Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value={{ $country->id }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">State:</label>
                                <select name="state_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''> Select State</option>
                                    @foreach ($states as $state)
                                        <option value={{ $state->id }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">City:</label>
                                <select name="city_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value=''> Select City</option>
                                    @foreach ($cities as $city)
                                        <option value={{ $city->id }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>

@stop()
