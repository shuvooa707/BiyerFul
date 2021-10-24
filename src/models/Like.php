<?php


    namespace Biyerful\models;

    class Like extends Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->table = "likes";
        }

        public function isLiked($userid)
        {
            $sql = "select count(*) yes from $this->table where user_id=" . user()["id"] . " and liked_user_id=" .$userid;
            $r = $this->query($sql)->fetch()["yes"];
            if ( $r ) 
            {
                return true;    
            }
            else 
            {
                return false;
            }
        }
    }
    







// 