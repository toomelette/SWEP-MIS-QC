<?php


namespace App\Http\Controllers;


use App\Http\Requests\Plantilla\PlantillaEmployeesFormRequest;
use App\Models\Employee;
use App\Models\HRPayPlanitilla;
use App\Models\HrPayPlantillaEmployees;
use App\Models\HrPlantilla;
use App\Models\Plantilla;
use Illuminate\Http\Request;

class HrPayPlantillaEmployeesController extends Controller
{
    public function store(PlantillaEmployeesFormRequest $request){
        $ppe = new HrPayPlantillaEmployees();
        $ppe->item_no = $request->item_no;
        $ppe->fullname = $request->fullname;
        $ppe->employee_no = $request->employee_no;
        $ppe->appointment_date = $request->appointment_date;
        if($ppe->save()){
            $this->updatePlantilla($ppe->item_no);
            $this->updateEmployee($ppe->employee_no);
            return $ppe->only('id');
        }
        abort(503,'Data not saved.');
    }

    public function index(Request $request){
        $ppe = HrPayPlantillaEmployees::query()
            ->where('item_no','=',$request->item_no);
        return \DataTables::of($ppe)
            ->addColumn('action',function($data){
                $destroy_route = "'".route("dashboard.plantilla_employees.destroy","slug")."'";
                $slug = "'".$data->id."'";
                $button = '<div class="btn-group">
                                    <button type="button" data="'.$data->id.'" onclick="delete_data('.$slug.','.$destroy_route.')" class="btn btn-sm btn-danger delete_jo_employee_btn" data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>';
                return $button;
            })
            ->escapeColumns([])
            ->setRowId('id')
            ->toJson();
    }

    private function updatePlantilla($item_no){
        $p = HRPayPlanitilla::query()->where('item_no','=',$item_no)->first();
        $ppe = HrPayPlantillaEmployees::query()
            ->where('item_no','=',$item_no)
            ->orderBy('appointment_date','desc')
            ->first();
        if(!empty($ppe)){
            $p->employee_no = $ppe->employee_no;
            $p->employee_name = $ppe->fullname;
            $p->update();
        }else{
            $p->employee_no = null;
            $p->employee_name = null;
            $p->update();
        }

    }

    private function updateEmployee($employee_no){
        $e = Employee::query()->where('employee_no','=',$employee_no)->first();
        $pp = HRPayPlanitilla::query()
            ->where('employee_no','=',$employee_no)
            ->orderBy('updated_at','desc')
            ->first();
        if(!empty($pp)){
            $e->item_no = $pp->item_no;
            $e->save();
        }else{
            $e->item_no = null;
            $e->save();
        }
    }

    private function transferPosition(){
        $p = HRPayPlanitilla::query()->selectRaw('item_no, employee_no, count(id) as count')
            ->groupBy('employee_no');
    }

    public function destroy($id){
        $emp = HrPayPlantillaEmployees::query()->find($id);
        if($emp->delete()){
            $this->updatePlantilla($emp->item_no);
            return 1;
        }
        abort(503,'Error deleting item.');
    }
}