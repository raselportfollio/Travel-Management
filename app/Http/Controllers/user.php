<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userModel;

class user extends Controller
{
    
    public function registration(Request $request){

        $data['name']=$request->input('name');
        $data['email']=$request->input('email');
        $data['password']=md5($request->input('password'));
        $data['dob']=$request->input('dob');
        $data['mobile']=$request->input('mobile');
        $data['status']="1";
        $data['userType']="1";
        $image  = $request->file('userImage');
        // print_r($image); exit();
        $profileImageSaveAsName = time() . "." .
        $image->getClientOriginalExtension();
        $upload_path = 'images/profileImage/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $image->move($upload_path, $profileImageSaveAsName);
        $data['userImage']=$profile_image_url;
        $data['tokenId']=md5(uniqid());
        if(userModel::verify_email($data['email'])){

            \Session::flash('message', 'Sorry! You have already an account with this email!'); 
            //Session::flash('message', 'This is a message!'); 
            \Session::flash('alert-type', 'error');
            return redirect("/");
       
        }
        else
        {
            if(userMOdel::insertUser($data))
            {
                \Session::flash('message', 'Thanks for joining with us!'); 
                //Session::flash('message', 'This is a message!'); 
                \Session::flash('alert-type', 'success');
                return redirect('/');
            }
            else 
            {
                \Session::flash('message', 'You can not join with us!'); 
                //Session::flash('message', 'This is a message!'); 
                \Session::flash('alert-type', 'error');
                return redirect("/");
            }
        }
    }
}
