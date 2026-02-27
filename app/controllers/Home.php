<?php

class Home extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            // Reuse Auth logic to redirect
            require_once 'app/controllers/Auth.php';
            $auth = new Auth;
            // We can't call private method, but we can check role manually or just redirect to auth
            header('Location: ' . BASE_URL . '/auth');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }
    }
}
