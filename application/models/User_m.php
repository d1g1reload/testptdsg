<?php

class User_m extends CI_Model
{


    function create($data)
    {
        $this->db->insert('users', $data);
    }

    function get_user($email)
    {
        return $this->db->where('email', $email)->get('users')->row();
    }

    function login($email, $password)
    {
        $this->db->where('email', $email);
        $account = $this->db->get('users')->row();
        if ($account != NULL) {
            if (password_verify($password, $account->password)) {
                return $account;
            }
        }
    }




    /**
     * update user
     */

    function get_profile_user($user_id)
    {
        return $this->db->where('id', $user_id)->get('users')->row();
    }

    function update_profile_user($user_id, $data)
    {
        return $this->db->where('id', $user_id)->update('users', $data);
    }

    function get_api_user($apikey)
    {
        return $this->db->where('apikey', $apikey)->get('users')->row();
    }
}
