<?php


    namespace Biyerful\models;

    class Like extends Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->table = "likes";
        }

        public function isLiked($subjectid)
        {
            // if not logged in 
            if ( !check() ) 
            {
                return false;
            }
            $sql = "select count(*) yes from $this->table where type='like' AND  user_id=" . user()["id"] . " and subject_user_id=" . $subjectid;
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
        public function isIgnored($subjectid)
        {
            // if not logged in 
            if ( !check() ) 
            {
                return false;
            }
            $sql = "select count(*) yes from $this->table where type='ignore' AND  user_id=" . user()["id"] . " and subject_user_id=" . $subjectid;
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