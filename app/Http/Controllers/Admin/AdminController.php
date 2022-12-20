<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
class AdminController extends Controller
{


            /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function index(Request $request)
        {
        $data = Admins::orderBy('id','DESC')->paginate(5);
        return view('admin.users.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.Add_user',compact('roles'));
        }
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function store(Request $request)
        {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
        'roles_name' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = Admins::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('admins.index')
        ->with('success','User created successfully');
        }
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
        $user = Admins::find($id);
        return view('Admin.users.show',compact('user'));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
        $user = Admins::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.users.edit',compact('user','roles','userRole'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'same:confirm-password',
        'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
        }else{

       // $input = array_except($input,array('password'));
        $input = Arr::except($input,array('password'));

        }
        $user = Admins::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('admins.index')
        ->with('success','User updated successfully');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
        Admins::find($id)->delete();
        return redirect()->route('admins.index')
        ->with('success','User deleted successfully');
        }
    public function index2(){

        return view('admin.home');
    }

    public function adminLogin(){

        if (!Auth::guard('admin')->check()) {
            return view('admin.login');
        }
       else{
        return redirect()->route('admin.home');
       }
    }

    public function checkAdminLogin(Request $request){

            $this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|min:6'
            ]);

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect()->intended('/admin');
            }
            return back()->withInput($request->only('email'));

    }






        }














