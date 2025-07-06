<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('signin-student');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', join(', ', $validator->messages()->all()))
                ->withInput()
                ->withErrors($validator->messages());
        }

        $credentials = $validator->safe()->only('nim', 'password');


        if (!Auth::guard('student')->attempt($credentials)) {
            return back()->withErrors('Nim atau Password Tidak Valid');
        }

        $request->session()->regenerate();

        return redirect()->intended('home');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('toast_success', 'Log out sukses');
    }

    public function editProfile()
    {
        return view('edit-profile');
    }

    public function updateProfile(Request $request, string $ID)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'nullable',
            'new_password' => 'nullable|min:6',
            'confirm_password' => 'required_with:new_password|same:new_password',
        ], [
            'confirm_password.same' => 'Pengulangan Password Tidak Sama',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('toast_error', join(', ', $validator->messages()->all()))
                ->withInput();
        }

        $data = $validator->safe()->all();

        try {
            $oldData = Student::find($ID);

            if (!isset($oldData)) throw new Exception('Data Mahasiswa Tidak Ditemukan');

            $arrayOldData = $oldData->toArray();
            $newData = Collection::make();

            if (isset($request['old_password']) && isset($request['new_password'])) {
                if (!(Hash::check($request['old_password'], $oldData->password))) {
                    throw new Exception('Password Lama Tidak Valid');
                } else {
                    $newData->put('password', $request['new_password']);
                }
            }

            foreach ($arrayOldData as $key => $value) {
                if ($value != ($request[$key] ?? $value)) {
                    $newData->put($key, $data[$key]);
                }
            }

            if (isset($request['password'])) {
                $newData['password'] = $request['password'];
            }

            $oldData->update($newData->toArray());

            return back()->with('success', 'Profil Diperbarui');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }
}
