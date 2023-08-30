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

        $allTimes = RestTimestamp::with('workTimestamp')->get();

        return view('date', compact('users','allTimes'));
    }
}
