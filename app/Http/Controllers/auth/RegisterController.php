<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = new User();
//        ddd("lines 33");
        if ($request->validated()) {
//            ddd($request->validated());
            /*
             * User uploaded image
             */
            if ($request->has("avatar")) {
                ddd("debugs");
                $image = $request->file("avatar");
                $reImage = time() . "." . $image->getClientOriginalExtension();
                $dest = public_path("\imgs");
                $image->move($dest, $reImage);
                //Save Data
                $user->avatar = $reImage;
                $user->email = $request->email;
                $user->name = $request->name;
                $user->username = $request->username;
                $user->password = $request->password;
                $user->username = $request->username;
                $user->save();
            } else {
                /*
               * User didn't upload image
               */
                $user = User::create($request->validated());
            }
        }
        $user->assignRole("user");

        auth()->login($user);

        return redirect("/")
            ->with('success', "Account successfully registered.");
    }
}
