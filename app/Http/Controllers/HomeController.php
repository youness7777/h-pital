<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;


class HomeController extends Controller
{
    public function redirect(){
        if (Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor=Doctor::all();
        return view('user.home',compact('doctor'));
                

            }else{
                $RD=Rendezvous::all();
                return view('admin.showRD',compact('RD'));
            }
        }else{
            return redirect()->back();
        }
    }

    public function index(){
        if (auth::id()){
        return redirect('home');
        
        }else{
        $doctor=Doctor::all();
        return view('user.home',compact('doctor'));
        }
      }

      public function add_RD(Request $request)
      {
            $RD=new Rendezvous();
            $RD->name=$request->name;
            $RD->email=$request->email;
            $RD->date=$request->date;    
            $RD->phone=$request->number;
            $RD->message=$request->message;
            $RD->doctor=$request->doctor;
            $RD->status='En cours de traitement';
            if(auth::id()){
                $RD->user_id =Auth::user()->id;

            }
            $RD->save();
            return redirect()->back()->with('message','votre demande de rendez-vous a été fait avec succès');


           

      }
      public function RD(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $userid=Auth::user()->id;
                $MesRD=Rendezvous::where('user_id',$userid)->get();
               return view('user.mesRD',compact('MesRD'));
        

            }else{
                return redirect()->back();
            }

       


    }else{
        return redirect('login');
    }

      }

      public function delete_RD(Rendezvous $id ){
          
        $id->delete();
           return redirect()->back();
      }
     
}
