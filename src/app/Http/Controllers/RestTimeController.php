<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RestTimestamp;

class RestTimeController extends Controller
{
    public function punchIn(Request $request)
    {
        $todo = $request->only(['work_timestamp_id','started_at','ended_at']);
        RestTimestamp::create($todo);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $todo = $request->only(['ended_at']);
        RestTimestamp::find($request->id)->update($todo);

        return redirect('/');
    }
}
