<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registerRequest;
use App\User;
use App\Role;

class RegistrationController extends Controller
{
     /************ for super admin ***********************/
     public function index(){
        $users=User::orderby('id','desc')->paginate(25);
        return view('super_admin.registration.index',compact('users'));
 }

 public function store(registerRequest $request){
     
    $user=new User();
     $user->name=$request->input('name');
     $user->email=$request->input('email');
     $user->password=bcrypt($request->input('password'));
     $user->save();

     $user->roles()->attach(Role::where('name','admin')->first());

    //session()->flash('success',"l'utilisateur à été bien ajouté !! ");
    return redirect('registrations');
 }

 public function create(){
     return view('super_admin.registration.create');
 }

 public function edit($id){
    
 }

 public function update(Request $request,$id){
    
 }
 public function destroy(Request $request,$id){
     $user=User::find($id);
     $user->delete();
     return redirect('registrations');
 }

 public function getUsers(){
    $users=User::all();
    return $users;
 }
}
