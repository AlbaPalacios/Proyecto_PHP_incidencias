<?php

namespace App\Http\Controllers;

use App\Mail\NuevaPassword;
use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function Ramsey\Uuid\v1;
//no lo utilizo
class UserController extends Controller
{
    public function __construct()
    {
    }

    public function resetearContraseña(Request $request){
        $usuario = User::where('email', $request->email);
        $usuario->email = Hash::make("nuevaPassword");
        $usuario->save();
        $this->mandarCorreoPassword($usuario->email, "nuevaPassword");
        return redirect()->route('login');
    }

    private function mandarCorreoPassword($email, $nuevaPassword) {
        return Mail::to($email)->send(new NuevaPassword(["password" => $nuevaPassword]));
    }
   
}
