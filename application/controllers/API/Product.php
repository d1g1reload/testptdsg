<?php
date_default_timezone_set('Asia/Jakarta');
header('Content-Type: application/json; charset=utf-8');
class Product extends CI_Controller
{


    function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey         = $this->input->post('API-KEY');
            $id_user        = $this->input->post('id_user');
            $nama           = $this->input->post('nama');
            $deskripsi      = $this->input->post('deskripsi');
            $harga          = $this->input->post('harga');
            $created        = date('Y-m-d H:i:s');

            if (empty(trim($id_user)) || empty(trim($nama)) || empty(trim($deskripsi)) || empty(trim($harga))) {
                http_response_code(400);
                $data = [
                    'code' => 400,
                    'message' => 'Parameter tidak boleh kosong.'
                ];
                echo json_encode($data);
                exit; // Menghentikan eksekusi jika parameter kosong
            }

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

            $insert = [
                'id_user'       => $id_user,
                'nama'          => $nama,
                'deskripsi'     => $deskripsi,
                'harga'         => $harga,
                'created'       => $created,
            ];
            $this->Product_m->add($insert);
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
                'data' => $insert
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

    function detail()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey     = $this->input->post('API-KEY');
            $id_produk  = $this->input->post('id_produk');

            if (empty(trim($id_produk))) {
                http_response_code(400);
                $data = [
                    'code' => 400,
                    'message' => 'Parameter tidak boleh kosong.'
                ];
                echo json_encode($data);
                exit; // Menghentikan eksekusi jika parameter kosong
            }

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

            $data = $this->Product_m->detail($id_produk);
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
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

    function list()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey     = $this->input->post('API-KEY');


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

            $data = $this->Product_m->list();
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
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

    function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey     = $this->input->post('API-KEY');
            $id_produk  = $this->input->post('id_produk');

            if (empty(trim($id_produk))) {
                http_response_code(400);
                $data = [
                    'code' => 400,
                    'message' => 'Parameter tidak boleh kosong.'
                ];
                echo json_encode($data);
                exit; // Menghentikan eksekusi jika parameter kosong
            }

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

            $data = $this->Product_m->delete($id_produk);
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
                'data' => 'Berhasil hapus data produk'
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

    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey         = $this->input->post('API-KEY');
            $id_produk      = $this->input->post('id_produk');
            $nama           = $this->input->post('nama');
            $deskripsi      = $this->input->post('deskripsi');
            $harga          = $this->input->post('harga');

            if (empty(trim($id_produk))) {
                http_response_code(400);
                $data = [
                    'code' => 400,
                    'message' => 'Parameter tidak boleh kosong.'
                ];
                echo json_encode($data);
                exit; // Menghentikan eksekusi jika parameter kosong
            }

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

            $update = [
                'nama'          => $nama,
                'deskripsi'     => $deskripsi,
                'harga'         => $harga,
            ];

            $data = $this->Product_m->update($id_produk, $update);
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
                'data' => $update
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
}
