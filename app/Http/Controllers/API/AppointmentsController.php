<?php

namespace App\Http\Controllers\API;
use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;

use App\User;

class AppointmentsController extends Controller
{

    function store(Request $request){

        $appointment = new Appointment;

        $appointment->id = $request->input('id');
        $appointment->number = $request->input('number');
        $appointment->user()->associate($request->input('user_id'));
        $result=$appointment->save();
        if($result==1){
            return "appointment is added";
        }else{
            return "Error";
        }
       
        
      
    }
    function delete($appointmentId){
        $result=Appointment::where('id',$appointmentId)->delete();
        if ($result==1) {
            return "appointment is deleted sussfuly";
        }else{
            return "Error"; 
        }
    }
    function getAppointment(){
        $users = User::get();
        foreach ($users as $user) {
            echo $user->name ;echo "  ";
        }
       // return $appointments;
    }

    function getUserAppointment($user_id){
       return $appointment = User::find($user_id)->appointment;
      
    }
    function getAllUsersAppo(){
        $appointment = DB::table('appointments')->get();
        $user_id = 1 ; 
        
        foreach ($appointment as $appo) {
            $user_id = $appo->user_id; 
            $user = User::where('id',$user_id)->get();

           echo $user;
         
        }
      
    }

}
