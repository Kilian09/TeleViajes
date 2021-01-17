<?php

namespace App\Http\Controllers;

use App\ContactForm;
use App\Paquetes;
use App\Products;
use App\User;


use Illuminate\Http\Request;

class userController extends Controller
{
    public function login()
    {
        return view('/login');
    }

    public function register()
    {
        return view('/register');
    }

    public function cruceros()
    {
        return view('/cruceros');
    }

    public function actividades()
    {
        return view('/actividades');
    }

    public function universitarios()
    {
        return view('/universitarios');
    }

    public function ancianos()
    {
        return view('/ancianos');
    }

    public function escolares()
    {
        return view('/escolares');
    }

    public function familia()
    {
        return view('/familia');
    }

    public function paquetes()
    {
        return view('/paquetes');
    }

    public function privacidad()
    {
        return view('/privacidad');
    }


    /**
     * DONE
     */
    public function procesar_registro()
    {
        if (isset($_POST["nombreDeUsuario"], $_POST["nombre"], $_POST["apellidos"], $_POST["email"],
            $_POST["contra1"], $_POST["contra2"])) {

            $nombreDeUsuario = $_POST["nombreDeUsuario"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["email"];
            $contra1 = $_POST["contra1"];
            $contra2 = $_POST["contra2"];

            if ($contra1 == $contra2) {
                //si existe el email registrado envia aviso e imposibilita el registro
                if (User::where('email', $email)->exists() && User::where('nombreDeUsuario', $nombreDeUsuario)->exists()) {
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

                    $usuario = new User(); //nombre del modelo User() que hace referencia a la tabla user
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

        $usuario = User::where('nombreDeUsuario', $datos[0])->get();

        //creamos 3 sesiones user, nombre, username. con el id, el nombre y nombre de usuario del usuario.
        session(['user' => $usuario[0]['id']]);
        session(['nombre' => $usuario[0]['nombre']]);
        session(['username' => $usuario[0]['nombreDeUsuario']]);

        return redirect()->to("/");
    }

    /**
     *
     */
    public function procesar_login()
    {
        if (isset($_POST["email"], $_POST["password"])) {

            $email = $_POST["email"];
            $contra = md5($_POST["password"]);

            $datos = array();
            $datos[0] = $email;
            $datos[1] = $contra;

            if (User::where('email', $datos[0])->exists()) {

                $usuario = User::where('email', $datos[0])->get();

                if ($usuario[0]['password'] == $datos[1]) {

                    //creamos 3 sesiones user, nombre, username. con el id, el nombre y nombre de usuario del usuario.
                    session(['user' => $usuario[0]['id']]);
                    session(['nombre' => $usuario[0]['nombre']]);
                    session(['username' => $usuario[0]['nombreDeUsuario']]);

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

    public function cerrar_session()
    {
        session()->forget(['user', 'nombre', 'username']);  //elimina las sesiones
        session()->flush();                     //elimina todos los datos de la sesion
        return view('index');
    }

    /**
     * Comprobar
     */
    public function procesar_contacto()
    {
        if (isset($_POST["nombre"], $_POST["email"], $_POST["telefono"], $_POST["comentario"])) {

            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $comentario = $_POST["comentario"];

            //revisar si el usuario esta registrado


            $datos = array();
            $datos[0] = $nombre;
            $datos[1] = $email;
            $datos[2] = $telefono;
            $datos[3] = $comentario;

            $contacto = new ContactForm(); //nombre del modelo ContactForm() que hace referencia a la tabla contact_form

            $contacto->nombre = $datos[0];
            $contacto->email = $datos[1];
            $contacto->telefono = $datos[2];
            $contacto->comentario = $datos[3];
            $contacto->save();


        }
        return redirect()->to("/contacto");
    }


}
