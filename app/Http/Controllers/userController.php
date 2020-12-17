<?php

namespace App\Http\Controllers;
use App\Usuario;


use Illuminate\Http\Request;

class userController extends Controller
{
    public function login(){
        return view('/login');
    }

    public function register(){
        return view('/register');
    }
    public function cruceros(){
        return view('/cruceros');
    }
    public function paquetes(){
        return view('/paquetes');
    }
    public function actividades(){
        return view('/actividades');
    }
    public function universitarios(){
        return view('/universitarios');
    }



    /**
     *
     */
    public function procesar_registro()
    {
        if (isset($_POST["nombreDeUsuario"],$_POST["nombre"],$_POST["apellidos"], $_POST["email"],
            $_POST["contra1"], $_POST["contra2"])) {

            $nombreDeUsuario = $_POST["nombreDeUsuario"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["email"];
            $contra1 = $_POST["contra1"];
            $contra2 = $_POST["contra2"];

            if ($contra1 == $contra2) {
                //si existe el email registrado envia aviso e imposibilita el registro
                if (Usuario::where('email', $email)->exists() && Usuario::where('nombreDeUsuario', $nombreDeUsuario)->exists()) {
                    return view('register', ['emailExistente' => true], ['nombreDeUsuarioExistente' => true]);
                } else {
                        //insertar en BD usando clase Eloquent
                        $datos = array();
                        $datos[0] = $nombreDeUsuario;
                        $datos[1] = $nombre;
                        $datos[2] = $apellidos;
                        $datos[3] = $email;
                        $datos[4] = md5($contra1);
                        $datos[5] = md5($contra2);

                        $usuario = new Usuario(); //nombre del modelo Usuario() que hace referencia a la tabla user
                        $usuario->nombreDeUsuario = $datos[0];
                        $usuario->nombre = $datos[1];
                        $usuario->apellidos = $datos[2];
                        $usuario->email = $datos[3];
                        $usuario->password = $datos[4];
                        $usuario->save();
                }
            } else {
                return view('register', ['contraseñaIncorrecta' => true]);
            }
        }

        $usuario = Usuario::where('nombreDeUsuario', $datos[0])->get();

        //creamos 2 sesiones user y nombre. con el id y con el nombre del usuario.
        session(['user' => $usuario[0]['id']]);
        session(['nombre' => $usuario[0]['nombre']]);
        session(['username' => $usuario[0]['nombreDeUsuario']]);

        return redirect()->to("/");
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
                    session(['nombreDeUsuario' => $usuario[0]['nombreDeUsuario']]);

                    //PODRIAMOS HACER UNA SESION CON EL EMAIL????????????????????????

                    return redirect()->to("/");
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
        session()->forget(['user', 'nombre','username']);  //elimina las sesiones
        session()->flush();                     //elimina todos los datos de la sesion
        return view('/');
    }


}
