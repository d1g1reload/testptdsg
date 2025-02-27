<?php

class Product_m extends CI_Model
{

    function add($data)
    {
        $this->db->insert('produk', $data);
    }

    function detail($id_produk)
    {
        return $this->db->where('id_produk', $id_produk)->get('produk')->row();
    }

    function list()
    {
        return $this->db->get('produk')->result();
    }

    function delete($id_produk)
    {
        $this->db->where('id_produk', $id_produk)->delete('produk');
    }

    function update($id_produk, $data)
    {
        return $this->db->where('id_produk', $id_produk)->update('produk', $data);
    }
}
