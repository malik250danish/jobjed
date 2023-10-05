<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupations;
use Illuminate\Http\Response;
use Redirect;
use View;

class OccupationsController extends Controller
{
    public function index(Request $request){
        $results = Occupations::all();
        return view('admin.settings.occuptions.index',compact('results'));
    }
    public function updateStatus($st,$id){
        Occupations::where('id', $id)->update(['enable' => $st]);
        return Redirect::back()->withInput()->with('success', 'Status has been updated.');
    }
    public function loadWorkExperience (Request $request){
        $results = \App\Models\Occupations::find($request->get('occupation_id'))->workhold;
        return response()->json([
                                    'st' => 'ok',
                                    'html'=> View::make('renderHtml/workexperincecheckbox',['results' => $results])->render(),
                                ]);
    }
    public function save(Request $request){
        $data = $request->all();
        if(!empty($data['workhold'])){
            $data['workhold'] = explode(",",$data['workhold']);
        }else{
            $data['workhold'] = null;
        }
        unset($data['_token']);
        $checkResult = Occupations::where('name','like','%'.$data['name'].'%')->first();
        if($checkResult){
            return Redirect::back()->withInput()->with('info', 'Occupation has been already exist.');
        }
        $data['enable'] = 1;
        Occupations::create($data);
        return Redirect::back()->withInput()->with('success', 'Occupation has been created.');
    }
    public function update($id,Request $request){
        $data = $request->all();
        if(!empty($data['workhold'])){
            $data['workhold'] = explode(",",$data['workhold']);
        }else{
            $data['workhold'] = null;
        }
        unset($data['_token']);
        Occupations::where('id',$id)->update($data);
        return Redirect::back()->withInput()->with('success', 'Occupation has been updated.');
    }
}
