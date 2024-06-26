<?php
    class Upload_files
    {
        public function upload($POST, $FILES)
        {
            $_SESSION['error'] = "";

            $allowed[] = "image/jpeg";
            $allowed[] = "video/mp4";
            //upload the file
            if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0)
            {
                if(in_array($FILES['file']['type'], $allowed))
                {

                }else
                {
                    $_SESSION['error'] = "Invalid image format";
                }
            }

            if($_SESSION['error'] == "")
            {
                $folder = "uploads/";
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                }

                $destination = $folder . $FILES['file']['name'];

                move_uploaded_file($FILES['file']['tmp_name'], $destination);
                
                $arr['title'] = esc($POST['title']);
                $arr['date'] = date("Y-m-d H:i:s");
                $arr['userid'] = 1;
                $arr['image'] = $destination;
                $arr['views'] = 0;
                $arr['urladdress'] = get_random_string_max(60);

                $DB = new Database();
                $query = "insert into image(title, userid, date, image, views, urladdress) values (:title, :userid, :date, :image, :views, :urladdress)";
                $DB->write($query, $arr);

                header("Location: " . ROOT . "index");
                die;
                
            }

            
        }
    }