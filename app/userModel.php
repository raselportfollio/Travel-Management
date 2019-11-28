<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected function insertUser($data)
    {
        $add=\DB::table('users_info')
        ->insert(['name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password'],'tokenId'=>$data['tokenId'],'status'=>$data['status'],'userImage'=>$data['userImage'],'userType'=>$data['userType'],'dob'=>$data['dob'],'mobile'=>$data['mobile']]);
     return $add;
    }
    protected function verify_email($email)
    {
        $add=\DB::table('users_info')
            ->select()
            ->where('email',$email)
            ->count();
        return $add;
    }
    protected function verify_user($email,$pass)
    {
        $add=\DB::table('users_info')
            ->select()
            ->where('email',$email)
            ->where('password',$pass)
            ->where('status',"1")
            ->first();
        return $add;
    }
}
