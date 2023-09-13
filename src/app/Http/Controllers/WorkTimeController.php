<?php

namespace App\Http\Controllers;

use App\Models\RestTimestamp;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkTimestamp;

class WorkTimeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $workTimes = WorkTimestamp::with('user')->get();



        // 勤務レコードの取得
        $allTimes = RestTimestamp::with('workTimestamp')->get();

        return view('index', compact('user','workTimes','allTimes'));
    }

    public function punchIn(Request $request)
    {
        $todo = $request->only(['user_id','started_at','ended_at']);
        WorkTimestamp::create($todo);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $todo = $request->only(['ended_at']);
        WorkTimestamp::find($request->id)->update($todo);

        return redirect('/');
    }

    public function date(Request $request)
    {
        // work_date_timesテーブルのデータを全件取得
        $users = WorkTimestamp::with('user')->get();
        $us = WorkTimestamp::with('user')->get()->pluck('user')->toArray();
        $us = array_column($us, 'name');

        $as = WorkTimestamp::with('user')->get();
        $userArray = $as->toArray();


        $fs = WorkTimestamp::with('user')->get()->pluck('started_at')->toArray();
        $str = implode(" ", $fs);

        $string = json_encode($fs);



        $js = WorkTimestamp::with('user')->get()->pluck('user','name')->toArray();

        $gs = WorkTimestamp::with('user')->get();

        $hs = User::with('workTimestamp')->get();

            $cols = array_column($us, 0);

        foreach ($as as $a){
            $b = $a['user']['name'];
            echo $b;
        }

        $ds = '';
        foreach ($as as $a){
            $ds .= $a['user']['name'];
        }

        $date = '';
        foreach ($users as $user){
            $date = array('user_name' => $user['user']['name']);
        }

        $workedAt ='';
        foreach ($users as $user){
            $workedAt .= $user['started_at'];
        }

        $endedAt ='';
        foreach ($users as $user){
            $endedAt .= $user['ended_at'];
        }

        $allTimes = RestTimestamp::with('workTimestamp')->get();

        $date = array('worked_at' => $workedAt);

        $date = array('name' => $us);

        foreach ($users as $user){
            $userName = $user->with('user')->get();
        }

        $users = WorkTimestamp::with('user')->get();

        $records = array();

        $userName = [];
        $workedAt = [];
        $endedAt = [];

        foreach ($users as $user) {
            $userName[] = $user['user']['name'];
            $workedAt[] = $user['started_at'];
            $endedAt[] = $user['ended_at'];

            $record = array(
                'user_name' => $userName,
                'worked_at' => $workedAt,
                'ended_at' => $endedAt
            );

            $records = array_merge($records, $record);
        }

        $accounts = WorkTimestamp::all();

        $names = array();
        foreach ($accounts as $account) {
            $names[] = $account->started_at;
        }

        $date = new WorkTimestamp;
        $records = $date->with('date');

        return view('date', compact('records','users','allTimes','workedAt','endedAt','date','userArray','as','js','fs','str','string','userName','records'));
    }

    public function test()
    {
        $users = WorkTimestamp::with('user')->get();

        $records = array();

        foreach($users as $user){
            $userName = array('user_name' => $user['user']['name']);
            $workedAt = $user['worked_at'];
            $endedAt = $user['ended_at'];

            $record = array(
                'user_name' => $userName,
                'worked_at' => $workedAt,
                'ended_at' => $endedAt
            );

            $records = array_merge($records,$record);
        }
    }
}
