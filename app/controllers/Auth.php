<?php

class Auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirectBasedOnRole();
        }
        $data['title'] = 'Login Pages';
        $this->view('auth/login', $data);
    }

    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']); // MD5 Hash requested

            $user = $this->model('User_model')->getUserByUsername($username);

            if ($user) {
                if ($user['password'] == $password) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role_id'] = $user['role_id'];
                    $_SESSION['nama'] = $user['nama_lengkap'];

                    $this->redirectBasedOnRole();
                } else {
                    Flasher::setFlash('Gagal', 'Password salah', 'danger');
                    header('Location: ' . BASE_URL . '/auth');
                    exit;
                }
            } else {
                Flasher::setFlash('Gagal', 'Username tidak ditemukan', 'danger');
                header('Location: ' . BASE_URL . '/auth');
                exit;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '/auth');
        exit;
    }

    private function redirectBasedOnRole()
    {
        switch ($_SESSION['role_id']) {
            case 1:
                header('Location: ' . BASE_URL . '/admin');
                break;
            case 2:
                header('Location: ' . BASE_URL . '/petugas');
                break;
            case 3:
                header('Location: ' . BASE_URL . '/peminjam');
                break;
            default:
                $this->logout();
        }
        exit;
    }
}
