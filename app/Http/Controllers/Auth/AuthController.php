<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role as Role;
use Validator;

class AuthController extends \App\Http\Controllers\Controller
{
   public function index()
    {
        $title = "Pages";
        
        return view('Admin.Pages.index')->with(compact('title'));
    }  
    
    //create roles
//    public function createRoles()
//    {
//         $owner = new Role();
//         $owner->name         = 'admin';
//         $owner->display_name = 'Project Admin';
//         $owner->description  = 'User is the owner of a given project';
//         $owner->save();
//         $admin = new Role();
//         $admin->name         = 'member';
//         $admin->display_name = 'Frontend User';
//         $admin->description  = 'User is allowed to purchase items from frontend';
//         $admin->save();
//         echo "Done!";exit;
//    }
    
//        //create users
//    public function createUsers()
//    {
//         // admin user create
//         $admin = Role::where('name', '=', 'admin')->first();
//         
//         $user = new User();
//         $user->name  = 'admin';
//         $user->email = 'admin@gmail.com'; 
//         $user->password  = Hash::make('123456'); 
//         $user->save();
//
//         $user->attachRole($admin);
//         echo 'done';
//         exit;
//    }
    
    
    /**
     * Serves the main Home page on front-end.
     */
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
            ]);

            if(!$validator->passes())
            {
                return back()->withErrors($validator)->withInput($request->all());
            }

            $user = User::where('email', $request->email)->first();

            if(!$user)
            {
                return redirect('/admin')->with(['level' => 'danger', 'content' => "Invalid username or password!!"]);
            }

            $userdata = array(
                'email' => $request->email,
                'password' => $request->password
            );

            if(Auth::attempt($userdata))
            {
                if (!Auth::user()->hasRole('admin'))
                {
                    return redirect('/admin')->with(['level' => 'danger', 'content' => "Invalid username or password!!"]);
                }
                if($request->remember == 1)
                {
                    setcookie('remember', $request->remember, time() + (86400 * 7), 'COOKIES_PAGE');
                    setcookie('email', $request->email, time() + (86400 * 7), 'COOKIES_PAGE');
                    setcookie('password', $request->password, time() + (86400 * 7), 'COOKIES_PAGE');
                }
                else
                {
                    setcookie("email", "");
                    setcookie("password", "");
                }
                
                return redirect('/admin/pages');
            }
            else
            {
                return redirect('/admin')->with(['level' => 'danger', 'content' => "Invalid username or password!!"]);
            }
        }
        
        $title = "Admin Login";
        
        return view('Auth.login')->with(compact('title'));
    }
    
    /**
     * Performs logout in backend section.
     * @return type
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
    
     /**
     * 
     * @param Request $request
     * @return type
     * change password
     */
    public function change_password(Request $request)
    {
        if (request()->method() == "POST")
        {
            $validator = Validator::make($request->all(), [
                    'old_password' => 'required',
                    'new_password' => 'required | min:6',
                    'confirm_password' => 'required|same:new_password',
            ]);

            if ($validator->passes())
            {
                if(Hash::check($request->old_password, Auth::user()->password))
                {
                    $user = Auth::user();
                    $user->password = bcrypt($request->get('new_password'));
                    $user->save();
                    
                    return redirect('/admin/change-password')->with(['level' => 'success',
                        'content' => "Password Changed Successfully."]);
                }
                else
                {
                    return redirect('/admin/change-password')->with(['level' => 'danger',
                           'content' => "Current password didn't match."]);
                }
            }
            else
            {
                return back()->with(['level' => 'danger', 'content' => "Unable to change password, Please check the below form for detailed errors."])
                        ->withErrors($validator)->withInput($request->all());
            }
        }

        $title = "Change Password";
        
        return view('Auth.change-password')->with(compact('title'));
    }
    
    /**
     * 
     * @param Request $request
     * @return type
     * member change password
     */
    public function change_password_member(Request $request)
    {
            $validator = Validator::make($request->all(), [
                    'old_password' => 'required',
                    'new_password' => 'required | min:6',
                    'confirm_password' => 'required|same:new_password',
            ]);

            if ($validator->passes())
            {
                if(Hash::check($request->old_password, Auth::user()->password))
                {
                    $user = Auth::user();
                    $user->password = bcrypt($request->get('new_password'));
                    $user->save();
                    
                    return response(['status' => 1, 'message' => 'Password updated successfully!' ]);
                }
                else
                {
                    return response(['status' => 0, 'message' => "Old password didn't match!"]);
                }
            }
            else
            {
                return response(['status' => 0, 'message' => "Unable to save!!", 'errors' => $validator->errors() ]);
            }
        }

    
}