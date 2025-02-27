<?php

class Main extends CI_Controller
{
    public function index()
    {


        $data['content'] = "app/main";
        $this->load->view('layouts/main', $data);
    }

   


   

}
