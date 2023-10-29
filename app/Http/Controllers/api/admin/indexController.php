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
    public function all(){
        $returnArray = [];
        /* WaitinApi */
        $returnArray['waiting'] = Appointment::where('isActive',null)->orWhere('isActive',0)->orderBy('date','ASC')->paginate(9, ['*'], 'waiting_page');
        $returnArray['waiting']->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        /* CancelApi */
        $returnArray['cancel'] = Appointment::where('isActive',2)->orderBy('date','ASC')->paginate(3, ['*'], 'cancel_page');
        $returnArray['cancel']->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        /* ListApi */
        $returnArray['list'] = Appointment::where('isActive',1)->where('date','>',date('Y-m-d'))->orderBy('workingHour','ASC')->paginate(9, ['*'], 'list_page');
        $returnArray['list']->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        /* LastApi */
        $returnArray['last'] = Appointment::where('date','<',date('Y-m-d'))->orderBy('date','DESC')->paginate(9, ['*'], 'last_page');
        $returnArray['last']->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        /* TodayApi */
        $returnArray['today'] = Appointment::where('isActive',1)->where('date', date('Y-m-d'))->orderBy('date','ASC')->paginate(9, ['*'], 'today_page');
        $returnArray['today']->getCollection()->transform(function ($value){
            $value['working'] = WorkingHours::getString($value['workingHour']);
            return $value;
        });
        return response()->json($returnArray);
    }
}
