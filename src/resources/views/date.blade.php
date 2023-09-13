@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/date.css')}}">
@endsection

@section('content')
<div class="date__content">
    <table class="date__table">
        <tr class="table__row">
            <th class="table__header">
                <p>名前</p>
            </th>
            <th class="table__header">
                <p>勤務開始</p>
            </th>
            <th class="table__header">
                <p>勤務終了</p>
            </th>
            <th class="table__header">
                <p>休憩時間</p>
            </th>
            <th class="table__header">
                <p>勤務時間</p>
            </th>
        </tr>
        @foreach ($users as $user)
        <tr class="table__row">
            <td class="table__data">
                <p></p>
            </td>
            <td class="table__data">
                <p>{{$user['started_at']}}</p>
            </td>
            <td class="table__data">
                <p>{{$user['ended_at']}}</p>
            </td>
            <td class="table__data">
                <p></p>
            </td>
            <td class="table__data">
                <p>09:30:00</p>
            </td>
        </tr>
        @endforeach
    </table>
</div>




{{ $users }}



@endsection