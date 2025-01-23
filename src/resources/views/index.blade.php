@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="{{asset("css/index.css")}}" />
@endsection

@section("content")
<div class="contactform__content">
    <div class="contactform__content-title">
        {{--googlefontからとってきてる inika--}}
        <h2 class="inika-regular">Contact</h2>
    </div>
    <div class="contactform__form">
        <form class="form" action="/confirm" method="post">
            @csrf
            {{-- 氏名 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--name">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{old("last_name")}}" />
                    </div>
                    <div class="form__input--name">
                    <input type="text" name="first_name" placeholder="例：太郎" value="{{old("first_name")}}" />
                    </div>
                </div>
                <div class="form__error">
                    @error("last_name")
                    {{$message}}
                    @enderror
                    @error("first_name")
                    {{$message}}
                    @enderror
                </div>
            </div>

            {{-- 性別 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--gender">
                    <label><input type="radio" name="gender" value="1" checked><span>男性</span></label>
                    <label><input type="radio" name="gender" value="2" ><span>女性</span></label>
                    <label><input type="radio" name="gender" value="3" ><span>その他</span></label>
                    </div>
                </div>
                <div class="form__error">
                    @error("gender")
                    {{$message}}
                    @enderror
                </div>
            </div>

            {{-- メールアドレス --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--email">
                    <input type="text" name="email" placeholder="例：test@example.com" value="{{old("email")}}">
                    </div>
                </div>
                <div class="form__error">
                    @error("email")
                    {{$message}}
                    @enderror
                </div>
            </div>

            {{-- 電話番号 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--tel">
                    <input type="text" name="tel-1" placeholder="080" value="{{old("tel-1")}}">
                    </div>
                    <span class="form__input--item">-</span>
                    <div class="form__input--tel">
                    <input type="text" name="tel-2" placeholder="1234" value="{{old("tel-2")}}">
                    </div>
                    <span class="form__input--item">-</span>
                    <div class="form__input--tel">
                    <input type="text" name="tel-3" placeholder="5678" value="{{old("tel-3")}}">
                    </div>
                </div>
                <div class="form__error">
                    @if ($errors->has("tel-1"))
                    {{$errors->first("tel-1")}}
                    @elseif ($errors->has("tel-2"))
                    {{$errors->first("tel-2")}}
                    @elseif ($errors->has("tel-3"))
                    {{$errors->first("tel-1")}}
                    @endif
                </div>
            </div>

            {{-- 住所 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--address">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{old("address")}}">
                    </div>
                </div>
                <div class="form__error">
                    @error("address")
                    {{$message}}
                    @enderror
                </div>
            </div>

            {{-- 建物名 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--adress">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{old("building")}}">
                    </div>
                </div>
            </div>

            {{-- お問い合わせの種類 リレーション必要そう --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--content">
                    <select name="category_id" required>
                        <option value="" selected disabled><span>選択してください</span></option>
                        @foreach ($categories as $category)
                        <option value="{{$category["id"]}}"> {{$category["content"]}} </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form__error">
                    @error("category_id")
                    {{$message}}
                    @enderror
                </div>
            </div>

            {{-- お問い合わせ内容 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--detail">
                    <textarea name="detail" rows="5" cols="40" placeholder="お問い合わせ内容をご記載ください"> {{old("detail")}} </textarea>
                    </div>
                </div>
                <div class="form__error">
                    @error("detail")
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
</div>


@endsection
