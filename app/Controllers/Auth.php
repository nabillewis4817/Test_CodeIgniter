<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        // Si l'utilisateur est déjà connecté, rediriger vers le tableau de bord
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }
    
    public function authenticate()
    {
        $session = session();
        
        // Validation des données du formulaire
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Veuillez fournir des identifiants valides.');
        }
        
        // Récupération des données du formulaire
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Vérification des identifiants (à adapter selon votre logique d'authentification)
        $db = \Config\Database::connect();
        $user = $db->table('users')
                  ->where('email', $email)
                  ->get()
                  ->getRow();
        
        if ($user && password_verify($password, $user->password)) {
            // Authentification réussie
            $userData = [
                'userId'    => $user->id,
                'username'  => $user->username,
                'email'     => $user->email,
                'isLoggedIn' => true
            ];
            
            $session->set($userData);
            
            // Se souvenir de l'utilisateur si demandé
            if ($this->request->getPost('remember_me')) {
                // Mettre en place un cookie de rappel (à sécuriser davantage en production)
                $rememberToken = bin2hex(random_bytes(32));
                // Ici, vous devriez stocker ce token dans la base de données et dans un cookie sécurisé
                // pour une authentification persistante
            }
            
            return redirect()->to('/dashboard')->with('success', 'Connexion réussie !');
        } else {
            // Échec de l'authentification
            return redirect()->back()->withInput()->with('error', 'Email ou mot de passe incorrect.');
        }
    }
    
    public function register()
    {
        return view('auth/register');
    }

    public function handleRegister()
    {
        // Règles de validation
        $rules = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[255]',
            'password_confirm' => 'matches[password]',
        ];

        $messages = [
            'name' => [
                'required' => 'Le nom est requis',
                'min_length' => 'Le nom doit contenir au moins 3 caractères',
                'max_length' => 'Le nom ne doit pas dépasser 100 caractères'
            ],
            'email' => [
                'required' => 'L\'email est requis',
                'valid_email' => 'Veuillez entrer un email valide',
                'is_unique' => 'Cet email est déjà utilisé'
            ],
            'password' => [
                'required' => 'Le mot de passe est requis',
                'min_length' => 'Le mot de passe doit contenir au moins 6 caractères',
                'max_length' => 'Le mot de passe ne doit pas dépasser 255 caractères'
            ],
            'password_confirm' => [
                'matches' => 'Les mots de passe ne correspondent pas'
            ]
        ];

        // Validation des données
        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                           ->with('validation', $this->validator)
                           ->withInput();
        }

        // Préparation des données pour l'insertion
        $data = [
            'name'     => esc($this->request->getPost('name')),
            'email'    => esc($this->request->getPost('email')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insertion dans la base de données
        $db = \Config\Database::connect();
        
        try {
            $db->table('users')->insert($data);
            
            // Récupération de l'ID de l'utilisateur nouvellement créé
            $userId = $db->insertID();
            
            // Connexion automatique après inscription
            $session = session();
            $session->set([
                'userId'    => $userId,
                'username'  => $data['name'],
                'email'     => $data['email'],
                'isLoggedIn' => true
            ]);
            
            return redirect()->to('/dashboard')->with('success', 'Inscription réussie ! Bienvenue ' . $data['name'] . ' !');
            
        } catch (\Exception $e) {
            // En cas d'erreur lors de l'insertion
            log_message('error', 'Erreur lors de l\'inscription : ' . $e->getMessage());
            return redirect()->back()
                           ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.')
                           ->withInput();
        }
    }
    
    public function logout()
    {
        // Détruire la session
        $session = session();
        $session->destroy();
        
        // Rediriger vers la page de connexion avec un message de succès
        return redirect()->to('/login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
