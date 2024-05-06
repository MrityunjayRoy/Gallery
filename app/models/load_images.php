<?php
    class load_images
    {
        public function get_images($find = "")
        {
            $DB = new Database();

            $limit = 16;
            $page_number = isset($_GET['page']) ? $_GET['page'] : 1;
            $page_number = $page_number < 1 ? 1 : $page_number;
            $offset = ($page_number - 1) * $limit;

            if($find == ''){
                $query = "select * from image order by id desc limit $limit offset $offset";
                return $DB->read($query);
            }else{
    
                $find = esc($find);
                $query = "select * from image where title like '%$find%' order by id desc limit $limit offset $offset";
                return $DB->read($query);
            }
        } 

        public function get_total()
        {
            $DB = new Database();
            $query = "select * from image";
            return count($DB->read($query));
        }

        public function get_single_image($urladdress)
        {
    
            $DB = new Database();
            $query = "update image set views = views + 1 where urladdress = :url limit 1";
            $arr['url'] = $urladdress;
            $DB->write($query,$arr);
    
            $query = "select * from image where urladdress = :url limit 1";
            $arr['url'] = $urladdress;
            $data = $DB->read($query,$arr);
            return $data[0] ;
        }
    }