<?php

    class Count 
    {
        public function count_all_users() 
        {
            require_once '../model/model.php';

            $model = new Model();

            $table = 'client';
            $field = 'email';
        
            $result = $model -> count($table, $field) -> fetch();
            
            return $result;
        }

        public function count_clients()
        {
            require_once '../model/model.php';

            $model = new Model();

            $table = 'client';
            $field = 'email';
            $search_field = 'role';
            $value = 0;

            $result = $model -> count_filter($table, $field, $search_field, $value) -> fetch();

            //var_dump($result);
            
            return $result;

        }

        public function count_livreurs() 
        {
            require_once '../model/model.php';

            $model = new Model();

            $table = 'client';
            $field = 'email';
            $search_field = 'role';
            $value = 1;

            $result = $model -> count_filter($table, $field, $search_field, $value) -> fetch();

            //var_dump($result);
            
            return $result;
        }

    }

?>
