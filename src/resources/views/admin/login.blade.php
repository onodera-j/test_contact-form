@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="{{asset("css/login.css")}}" />
@endsection

@section("button")
    <button class="header__button inika-regular" onclick="location.href='/register'">register</button>
@endsection

@section("content")
<div class="login__content">
    <div class="login__content-title">
        <h2 class="inika-regular">Login</h2>
    </div>
    <div class="login__form">
        <form class="form" action="/login" method="post">
            @csrf
            {{--メールアドレス--}}
            <div class="form__group">
                <div class=form__group-title>
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__content">
                    <input type="text" name="email" placeholder="例：test@example.com" value="{{ old("email") }}" />
                </div>
                <div class="form__error">
                    @error("email")
                    {{$message}}
                    @enderror
                </div>
            </div>

            {{--パスワード--}}
            <div class="form__group">
                <div class=form__group-title>
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__content">
                    <input type="password" name="password" placeholder="例：coachtech1106" />
                </div>
                <div class="form__error">
                    @error("password")
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>

@endsection
