<?php 
    class upload extends controller
    {
        function index()
       {
            
       }

       function image()
       {
          $data['page_title'] = "Upload Image";

          $user = $this->loadModel("user");
          //check if logged in
          if($result = $user->is_looged_in())
          {
             header("Location: ". ROOT . "upload-image");
          }
          
          if(isset($_FILES['file']))
          {
          $model = $this->loadModel("upload_files");
          $model->upload($_POST, $_FILES); 
          }

          $this->view("upload-image", $data);
       }

       function video()
       {
            $data['page_title'] = "Upload Video";
            $this->view("upload-video", $data);
       }
    }