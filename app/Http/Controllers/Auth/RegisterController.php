<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\PersonType;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Respect\Validation\Validator as v;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'person_type_id' => ['required', 'int'],
            'document' => [
                'required',
                function ($attribute, $value, $fail) use ($data) {
                    if (intVal($data['person_type_id']) === 1) {
                        return v::cpf()->validate($value)
                            ? true
                            : $fail('Insira um CPF válido');
                    }

                    return v::cnpj()->validate($value)
                            ? true
                            : $fail('Insira um CNPJ válido');
                },
            ],
        ]);
    }

    public function showRegistrationForm()
    {
        $personTypes = PersonType::all()->pluck('name', 'id');

        return view('auth.register')
            ->with(['personTypes' => $personTypes]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::createWithWallet($data);
    }
}
