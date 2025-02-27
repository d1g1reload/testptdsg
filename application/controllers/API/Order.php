<?php
date_default_timezone_set('Asia/Jakarta');
header('Content-Type: application/json; charset=utf-8');
class Order extends CI_Controller
{


    function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey       = $this->input->post('API-KEY');
            $id_user      = $this->input->post('id_user');
            $id_produk    = $this->input->post('id_produk');
            $inv_number   = date('YmdHis');
            $qty          = $this->input->post('qty');
            $created      = date('Y-m-d H:i:s');

            if (empty(trim($id_user)) || empty(trim($id_produk)) || empty(trim($inv_number)) || empty(trim($qty))) {
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
                'id_produk'     => $id_produk,
                'inv_number'    => $inv_number,
                'qty'           => $qty,
                'created'       => $created,
            ];
            $this->Trx_m->add($insert);
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

    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey         = $this->input->post('API-KEY');
            $id_trx         = $this->input->post('id_trx');
            $is_status      = $this->input->post('is_status');


            if (empty(trim($id_trx)) || empty(trim($is_status))) {
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
                'is_status' => $is_status,
            ];

            $data = $this->Trx_m->update($id_trx, $update);
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

    /**
     * Paymnet
     */
    function payment()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey         = $this->input->post('API-KEY');
            $id_trx         = $this->input->post('id_trx');

            if (empty(trim($id_trx))) {
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
                'is_status' => 2,
            ];

            $data = $this->Trx_m->update($id_trx, $update);
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
                'data' => [
                    'message' => 'Pembayaran Berhasil',
                    'status' => $update
                ]
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

    function invoice()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $apikey     = $this->input->post('API-KEY');
            $id_trx     = $this->input->post('id_trx');

            if (empty(trim($id_trx))) {
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

            $data = $this->Trx_m->detail($id_trx);
            $clean_data = [
                'id_trx'            => $data->id_trx,
                'inv_number'        => $data->inv_number,
                'fullname'          => $data->fullname,
                'nama_produk'       => $data->nama,
                'deskripsi_produk'  => $data->deskripsi,
                'harga_produk'      => $data->harga,
                'qty_produk'        => $data->qty,

            ];
            http_response_code(200);
            $data = [
                'code' => 200,
                'message' => 'Sukses',
                'data' => $clean_data
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
