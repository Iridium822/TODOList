<?php

class ModelLogin extends Model
{
    public function getData()
    {

    }

    /*
     * Verification User function
     */
    public static function getLogin($user_name, $psw)
    {
        $user_count = ORM::for_table('users')
            ->where(array(
                'login' => $user_name,
                'psw_hash' => $psw
            ))->count();
        $auth = ($user_count > 0)?true:false;
        return $auth;
    }

    public static function getId($login){
        $user = ORM::for_table('users')
            ->where('login',$login)->find_one();
        return $user->id_user;
    }

}