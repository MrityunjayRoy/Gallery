<?php
    class videos extends controller
    {
       function index()
       {
            $data['page_title'] = "Videos";
            $this->view("videos", $data);
       }

    }
?>