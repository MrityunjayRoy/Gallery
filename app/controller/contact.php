<?php
    class contact extends controller
    {
       function index()
       {
            $data['page_title'] = "Contact";
            $this->view("contact", $data);
       }

    }
?>