<?php
require '../vendor/autoload.php';

use Carbon\Carbon;

$dt = carbon::now();

$today = new carbon('today');
?>


@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="attendance-form__content">
    <div class="attendance-form__heading">
        <h2>{{$user['name']}}さんお疲れ様です！</h2>
    </div>
    <div class="work-form">
        <form class="form" action="/WorkDateTime" method="post">
            @csrf
            <div class="form__group">
                <input type="hidden" name="user_id" value="{{$user['id']}}">
                <input type="hidden" name="started_at" value="{{$dt}}">
                <button class="form__button-submit">
                    勤務開始
                </button>
            </div>
        </form>
        <form class="form" action="/WorkDateTime/update" method="post">
            @method('PATCH')
            @csrf
            <div class="form__group">
                @foreach($workTimes as $workTime)
                @if($user->id == $workTime->user_id)
                <input type="hidden" name="id" value="{{$workTime->id}}">
                <input type="hidden" name="ended_at" value="{{$dt}}">
                @endif
                @endforeach
                <button class="form__button-submit">
                    勤務終了
                </button>
            </div>
        </form>
    </div>
    <div class="rest-form">
        <form class="form" action="/RestDateTime" method="post">
            @csrf
            <div class="form__group">
                @foreach($workTimes as $workTime)
                <input type="hidden" name="work_timestamp_id" value="{{$workTime->id}}">
                <input type="hidden" name="started_at" value="{{$dt}}">
                <!-- {{$workTime->working_hours}} -->
                @endforeach
                <button class="form__button-submit">
                    休憩開始
                </button>
            </div>
        </form>
        <form class="form" action="/RestDateTime/update" method="post">
            @method('PATCH')
            @csrf
            <div class="form__group">
                @foreach($workTimes as $workTime)
                @if($user->id == $workTime->user_id)
                <input type="hidden" name="id" value="{{$workTime->id}}">
                @endif
                @endforeach
                @foreach($allTimes as $allTime)
                <input type="hidden" name="id" value="{{$allTime->id}}">
                <input type="hidden" name="ended_at" value="{{$dt}}">
                @endforeach
                <button class="form__button-submit">
                    休憩終了
                </button>
            </div>
        </form>
    </div>
</div>
@endsection