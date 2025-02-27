<?php
date_default_timezone_set('Asia/Jakarta');
header('Content-Type: application/json; charset=utf-8');
class User extends CI_Controller
{

    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $options = ['cost' => 12];
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $encrypt_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $phone = $this->input->post('phone');
            $created_at = date('Y-m-d');
            $api_key = $this->dsg_lib->generate_api_key();

            $data = array(
                'fullname'  => $fullname,
                'email'     => $email,
                'password'  => $encrypt_pass,
                'phone'     => $phone,
                'apikey'   => $api_key,
                'created_at' => $created_at
            );
            $this->User_m->create($data);
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Berhasil buat akun',
                'data' => $data
            ];
            echo json_encode($data);
        } else {
            http_response_code(404);
            $data = [
                'code' => 404,
                'message' => 'Harap gunakan Method POST'
            ];
            echo json_encode($data);
        }
    }

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey     = $this->input->post('API-KEY');
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');


            $data_key = $this->User_m->get_api_user($apikey);


            if (!$data_key || $apikey != $data_key->apikey) {
                http_response_code(403);
                $data = [
                    'code' => 403,
                    'message' => 'Maaf API-Key anda salah/tidak terdaftar.'
                ];
                echo json_encode($data);
                exit;
            }

            $accessAccount = $this->User_m->login($email, $password);

            if (!$accessAccount) {
                http_response_code(200);
                $data = [
                    'code' => 200,
                    'message' => 'Gagal',
                    'data' => 'Email/Password anda salah'
                ];
                echo json_encode($data);
                exit;
            }
            if (password_verify($password, $accessAccount->password)) {
                $data = array(
                    'userid'    => $accessAccount->id_user,
                    'fullname'  => $accessAccount->fullname,
                    'email'     => $accessAccount->email,
                    'phone'     => $accessAccount->phone,
                    'apikey'    => $accessAccount->apikey,

                );
                http_response_code(200);
                $data = [
                    'code' => 200,
                    'message' => 'Sukses',
                    'data' => $data
                ];
                echo json_encode($data);
            }
        } else {
            http_response_code(404);
            $data = [
                'code' => 404,
                'message' => 'Harap gunakan Method POST'
            ];
            echo json_encode($data);
        }
    }
}
