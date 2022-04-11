<?php
namespace App\Classies;
use App\Interfaces\WorkWithDataInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WorkWithSqlite implements WorkWithDataInterface
{
    private string $connectionName;

    public function __construct(string $connectionName)
    {
        if(!empty($connectionName)){
            $this->connectionName = $connectionName;
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll():\Illuminate\Support\Collection{
            return DB::connection($this->connectionName)->table('users')->get();
    }

    public function createModel(Request $request)
    {
        $correct_db = "unique:".getDataSource().".users";
        $email_rule = ['bail','required',$correct_db];

        $validData = $request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=> $email_rule,
        ]);

        $user = new User();
        $user['first_name'] = $validData['first_name'];
        $user['last_name'] = $validData['last_name'];
        $user['email'] = $validData['email'];

        $user->save();
        return true;
    }

    public function deleteModel($id)
    {
        if(isset($id) && is_numeric($id) ){
            if($user = User::find($id)){
                $user->delete();
                return redirect()->route('showData', getDataSourceForRoute())->withSuccess(__('User :first_name :last_name deleted successfully',['first_name'=>$user->first_name,'last_name'=>$user->last_name]));
            }
            else
                return redirect()->route('showData', getDataSourceForRoute())->withErrors(__('No such user'));
        }
        else
            return redirect()->route('showData', getDataSourceForRoute())->withErrors(__('Data error'));
    }

    public function updateModel(Request $request)
    {
        if($request->input('id') && is_numeric($request->input('id')) && $user = User::findOrFail($request->input('id')) ){

            $validData = $request->validate([
                'first_name'=>['required'],
                'last_name'=>['required'],
                'email'=> ['required'],
            ]);


            try {
                $user->update($request->all());
            }
            catch (\Exception  $e) {
                return redirect()->back()->withErrors(__('Some error happened, email can exist'));
            }
            return redirect()->route('showData', getDataSourceForRoute())->withSuccess(__('Updated successfully'));
        }
        return redirect()->route('showData', getDataSourceForRoute())->withErrors(__('Some error happened'));
    }

    public function getConnectionName():string
    {
        return $this->connectionName ?? '';
    }
}
