<?php


    namespace Biyerful\models;

    class User extends Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->table = "users";
        }
    }
    







// 