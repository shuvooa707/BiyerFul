<?php


    namespace Biyerful\models;

    class Shortlist extends Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->table = "shortlisted";
        }

        public function isShortlisted($subjectid)
        {
            // if not logged in 
            if ( !check() ) 
            {
                return false;
            }
            $sql = "select count(*) yes from $this->table where user_id=" . user()["id"] . " and subject_user_id=" . $subjectid;
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