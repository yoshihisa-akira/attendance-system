@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>ログイン</h2>
    </div>
    <form class="form">
        <div class="form__group">
            <div class="form__input--text">
                <input type="email" name="email" value="{{old('email')}}" placeholder="メールアドレス">
            </div>
            <div class="form__error">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__input--text">
                <input type="password" name="password" placeholder="パスワード">
            </div>
            <div class="form__error">
                @error('password')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
    <div class="register__link">
        <div class="register__link-guide">
            <span class="register__link-guide--text">
                アカウントをお持ちでない方はこちら
            </span>
        </div>
        <div class="register__button" href="/register">
            <a class="register__button-submit" href="/register">
                会員登録
            </a>
        </div>
    </div>
</div>
@endsection