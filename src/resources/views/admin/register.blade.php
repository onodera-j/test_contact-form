@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="{{asset("css/register.css")}}" />
@endsection

@section("button")
    <button class="header__button inika-regular" onclick="location.href='/login'">login</button>
@endsection

@section("content")
<div class="register__content">
    <div class="register__content-title">
        <h2 class="inika-regular">Register</h2>
    </div>
    <div class="register__form">
        <form class="form" action="/register" method="post">
            @csrf
            {{--名前--}}
            <div class="form__group">
                <div class=form__group-title>
                    <span class="form__label--item">お名前</span>
                </div>
                <div class="form__content">
                    <input type="text" name="name" placeholder="例：山田　太郎" value="{{ old("name") }}" />
                </div>
                <div class="form__error">
                {{--    @error("name")
                    {{$messege}}
                    @enderror --}}
                </div>
            </div>

            {{--メールアドレス--}}
            <div class="form__group">
                <div class=form__group-title>
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__content">
                    <input type="text" name="email" placeholder="例：test@example.com" value="{{ old("email") }}" />
                </div>
                <div class="form__error">
                 {{--   @error("email")
                    {{$messege}}
                    @enderror --}}
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
                 {{--   @error("password")
                    {{$messege}}
                    @enderror --}}
                </div>
            </div>
            <div class="form__button">
                {{--login画面に遷移できない--}}
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection
