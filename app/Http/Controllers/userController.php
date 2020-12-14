<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function login(){
        return view('/login');
    }

    public function register(){
        return view('/register');
    }


    /**
     *
     */
    public function procesar_registro()
    {
        if (isset($_POST["nombre"], $_POST["email"], $_POST["contra1"], $_POST["contra2"])) {

            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $contra1 = $_POST["contra1"];
            $contra2 = $_POST["contra2"];

            if ($contra1 == $contra2) {
                //si existe el email registrado envia aviso e imposibilita el registro
                if (Usuario::where('email', $email)->exists()) {
                    return view('register', ['emailExistente' => true]);
                } else {
                        //insertar en BD usando clase Eloquent
                        $datos = array();
                        $datos[0] = $nombre;
                        $datos[1] = $email;
                        $datos[2] = md5($contra1);
                        $datos[3] = md5($contra2);

                        $usuario = new Usuario(); //nombre del modelo Usuario() que hace referencia a la tabla user
                        $usuario->nombre = $datos[0];
                        $usuario->email = $datos[1];
                        $usuario->password = $datos[2];
                        $usuario->save();
                }
            } else {
                return view('register', ['contraseñaIncorrecta' => true]);
            }
        }
        $usuario = Usuario::where('nombre', $datos[0])->get();
        //creamos 2 sesiones user y nombre. con el id y con el nombre del usuario.
        session(['user' => $usuario[0]['id']]);
        session(['nombre' => $usuario[0]['nombre']]);
        return redirect()->to("/index");
    }

    /**
     *  NOT DONE
     */
    public function procesar_login()
    {
        if (isset($_POST["email"], $_POST["password"])) {

            $email = $_POST["email"];
            $contra = md5($_POST["password"]);

            $datos = array();
            $datos[0] = $email;
            $datos[1] = $contra;

            if (Usuario::where('email', $datos[0])->exists()) {

                $usuario = Usuario::where('email', $datos[0])->get();

                if ($usuario[0]['password'] == $datos[1]) {

                    //creamos 2 sesiones user y nombre. con el id y con el nombre del usuario.
                    session(['user' => $usuario[0]['id']]);
                    session(['nombre' => $usuario[0]['nombre']]);

                    return redirect()->to("/index");
                } else {
                    return view('login', ['contraseñaIncorrecta' => true]);
                }
            } else {
                return view('login', ['usuarioInexistente' => true]);
            }
        }
    }

    /**
     *
     */
    public function cerrar_session()
    {
        session()->forget(['user', 'nombre']);  //elimina las sesiones
        session()->flush();                     //elimina todos los datos de la sesion
        return view('index');
    }


}
