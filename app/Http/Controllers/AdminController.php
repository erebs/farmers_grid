<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\admin_detail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function home()
    {
        return view('admin.LoginPage');
    }

    public function login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('admin')->attempt(['username' => $uname, 'password' => $psw]))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }
        }
        else if($rememberStatus==1)
        {

            if(Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password],true))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }

        }

        echo json_encode($data);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.home');
    }

    public function dashboard()
    {
       $header="Dashboard";
        return view('admin.Dashboard',['header'=>$header]);
    }



    public function admin_profile()
    {
        $adid=Auth::guard('admin')->user()->id;
        $adm=admin_detail::where('id',$adid)->first();
        $header="Dashboard";
        return view('admin.adminprofile',['adm'=>$adm,'header'=>$header]);
    }
    // public function edit_admin_profile()
    // {
    //     $adid=Auth::guard('admin')->user()->id;
    //     $adm=admin_detail::where('id',$adid)->first();
    //     $header="Dashboard";
    //     return view('admin.AdminProfileEdit',['adm'=>$adm,'header'=>$header]);
    // }

     public function admin_profile_update(Request $req)
    {
       $adid=Auth::guard('admin')->user()->id;
           $adm=admin_detail::where('id',$adid)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$adm->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/admin/img/' . $adm->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/img'), $new_name);
            //$ins['Photo']=$new_name;
        }

            admin_detail::where('id',$adid)->update([
                'name'=>$req->cname,
                'username'=>$req->username,
                'mobile'=>$req->cmobile,
                'mail_id'=>$req->cmail,
                'profile_image'=>$new_name,
                // 'facebook'=>$req->cfb,
                // 'instagram'=>$req->cins,
                // 'twitter'=>$req->ctwitter,
            ]) ;
            $data['success']="success";

        echo json_encode($data);

    }



    public function change_password()
    {
        $header="Settings";
        return view('admin.changepass',['header'=>$header]);

    }
    public function password_update(Request $req)
    {
        $adid=Auth::guard('admin')->user()->id;
        $currentpass=auth()->guard('admin')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            admin_detail::where('id',$adid)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);

    }


}

