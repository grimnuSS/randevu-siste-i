<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\WorkingHours;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function process(Request $request){
        $all = $request->except('_token');
        Appointment::where('id',$all['id'])->update(['isActive'=>$all['type']]);
        return response()->json(['status'=>true]);
    }
    public function getWaitingList(){
        $data = Appointment::where('isActive',0)->orderBy('date','ASC')->paginate(9);
        $data->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        return response()->json($data);
    }
    public function getCancelList(){
        $data = Appointment::where('isActive',2)->orderBy('date','ASC')->paginate(9);
        $data->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        return response()->json($data);
    }
    public function getList(){
        $data = Appointment::where('isActive',1)->where('date','>',date('Y-m-d'))->orderBy('workingHour','ASC')->paginate(9);
        $data->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        return response()->json($data);
    }
    public function getLastList(){
        $data = Appointment::where('date','<',date('Y-m-d'))->orderBy('date','DESC')->paginate(9);
        $data->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        return response()->json($data);
    }

    public function getTodayList(){
        $data = Appointment::where('isActive',1)-where('date', date('Y-m-d'))->orderBy('date','ASC')->paginate(9);
        $data->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        return response()->json($data);
    }
}
