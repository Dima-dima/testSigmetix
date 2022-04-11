<?php

namespace App\Http\Controllers;

use App\Interfaces\WorkWithDataInterface;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private WorkWithDataInterface $workWithDb;

    public function setWorkWithDataInterface(WorkWithDataInterface $workWithDb){
        $this->workWithDb = $workWithDb;
    }

    public function index()
    {
       request()->session()->put('dataSource', $this->workWithDb->getConnectionName());
       $users = $this->workWithDb->getAll();
       $title = __("Data from "). $this->workWithDb->getConnectionName();
       return view("show",compact("title","users"));
    }

    public function addForm(){
        $title = __("Add data to "). getDataSource();
        return view("add",compact("title"));
    }

    public function addData(Request $request){
        if($this->workWithDb->createModel($request))
            return redirect()->route('showData', getDataSourceForRoute())->withSuccess(__('Added successfully'));
    }

    public function deleteUser($id){
       return $this->workWithDb->deleteModel($id);
    }

    public function editForm($id)
    {
        $title = __("Edit user data");
        $user = null;
        if(isset($id) && is_numeric($id))
            $user = User::find($id);

        return view("edit",compact("title","user"));
    }

    public function updateModel(Request $request)
    {
        return $this->workWithDb->updateModel($request);
    }
}
