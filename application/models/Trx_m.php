<?php

class Trx_m extends CI_Model
{


    function add($data)
    {
        $this->db->insert('order', $data);
    }

    function update($id_trx, $data)
    {
        $this->db->where('id_trx', $id_trx)->update('order', $data);
    }

    function detail($id_trx)
    {
        $this->db->join('produk', 'produk.id_produk = order.id_produk', 'inner');
        $this->db->join('users', 'users.id_user = order.id_user', 'inner');
        return $this->db->where('id_trx', $id_trx)->get('order')->row();
    }
}
