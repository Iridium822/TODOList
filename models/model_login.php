<?php


class Model_Login extends Model
{
    public function get_data(){

    }
    public function getLogin($user_name, $psw)
    {
        $user_count = ORM::for_table('users')
            ->where(array(
                'login' => $user_name,
                'psw_hash' => $psw
            ))
            ->count();
        if ($user_count > 0) {
            $user = ORM::for_table('users')
                ->where(array(
                    'login' => $user_name,
                    'psw_hash' => $psw
                ))
                ->find_one();
            return $user->id_user;

        }else{
            return false;
        }
    }
}