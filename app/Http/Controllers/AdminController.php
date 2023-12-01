<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Rendezvous;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MyFirstNotification;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
   public function addview(){
    if(Auth::id()){

      if(Auth::user()->usertype==1){

        return view('admin.adddoctor');

      }else{
        return redirect()->back();
      }
    }else{
      return redirect('login');
    }
    
   }
   
   public function add_doctor(Request $request ){
    $doctor=new Doctor();
    $image=$request->file;
    $imagename=time().'.'.$image->getClientoriginalExtension();
    $request->file->move('doctorimage',$imagename);

    $doctor->image=$imagename;
    $doctor->name=$request->name;
    $doctor->phone=$request->number;
    $doctor->room=$request->room;
    $doctor->speciality=$request->speciality;
    $doctor->save();
    return redirect()->back()->with('message','le docteur a été ajouté avec succèss');

   }

   public function show_RD(){
    if(Auth::id()){

      if(Auth::user()->usertype==1){

        $RD=Rendezvous::all();
      return view('admin.showRD',compact('RD'));
      }else{
        return redirect()->back();
      }
    }else{
      return redirect('login');
    }
      
    }

    public function cancel_RD($id){
      $RD=Rendezvous::find($id);
      $RD->status='demande refusée';
      $RD->save();
      
      return redirect()->back();
    }

    public function validate_RD($id){
      $RD=Rendezvous::find($id);
      $RD->status='demande acceptée';
      $RD->save();
      return redirect()->back();
    }

    public function gerer_doctor(){
      $doctor=Doctor::all();
      return view('admin.managedoctor',compact('doctor'));

    }

    public function upd_doctor($id){
      $doctor=Doctor::find($id);
      return view('admin.updatedoctor',compact('doctor'));
    }
     
    public function delete_doctor(Doctor $id ){
          
      $id->delete();
         return redirect()->back();
    }

    public function edit_doctor(Request $request ,$id){
      $doctor=Doctor::find($id); 
      $image=$request->file;
    $imagename=time().'.'.$image->getClientoriginalExtension();
    $request->file->move('doctorimage',$imagename);

    $doctor->image=$imagename;
    $doctor->name=$request->name;
    $doctor->phone=$request->number;
    $doctor->room=$request->room;
    $doctor->speciality=$request->speciality;
    $doctor->save();
    return redirect()->back()-> with('message','le docteur a été modifié avec succèss');
    }

    public function emailview($id){
      $data=Rendezvous::find($id);

      return view('admin.emailview',compact('data'));
    }

    public function sendemail(Request $request,$id){
      $data=Rendezvous::find($id);

          $details=[
            'salutation' =>$request->Politesse, 
            'corps' =>$request->Salutation ,
            'actiontext'=>$request->URL,
            'actionurl'=> $request->Objet,
            'politesse'=> $request->Corps
                
          ];

          Notification::send($data,new MyFirstNotification($details));

          return redirect()->back()->with('message','le courrier électronique a été envoyé avec succèss');
    }
}

