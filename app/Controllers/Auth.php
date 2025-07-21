<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function handleRegister()
    {
        // Traitement de l'inscription ici
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return view('auth/register', ['validation' => $this->validator]);
        }

        // Enregistrement dans la base de données (exemple simple, à sécuriser)
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // À adapter : insérer dans une table "users"
        $db = \Config\Database::connect();
        $db->table('users')->insert($data);

        return redirect()->to('/login')->with('success', 'Inscription réussie !');
    }
}
