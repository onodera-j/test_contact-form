@extends("layouts.app")

@section("css")
<link rel="stylesheet" href="{{asset("css/confirm.css")}}" />
@endsection

@section("content")
<div class="confirm__content">
    <div class="confirm__content-title">
        <h2 class="inika-regular">Confirm</h2>
    </div>

    <div class="confirm__table">
        <form class="form" action="/thanks" method="post">
            @csrf
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__content">
                        {{ $contact["last_name"] }} {{ $contact["first_name"] }}
                        <input type=hidden name="last_name" value="{{ $contact["last_name"] }}"/>
                        <input type=hidden name="first_name" value="{{ $contact["first_name"] }}"/></td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__content">

                        @switch($contact["gender"])
                        @case(1)
                            男性
                            @break
                        @case(2)
                            女性
                            @break
                        @default
                            その他
                        @endswitch
                        <input type=hidden name="gender" value="{{ $contact["gender"] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__content">{{$contact["email"]}}
                        <input type=hidden name="email" value="{{ $contact["email"] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__content">{{$contact["tel-1"]}}{{$contact["tel-2"]}}{{$contact["tel-3"]}}
                        <input type=hidden name="tel" value="{{ $contact["tel-1"] }}{{ $contact["tel-2"] }}{{ $contact["tel-3"] }}"/>
                        {{--修正用--}}
                        <input type=hidden name="tel-1" value="{{ $contact["tel-1"] }}"/>
                        <input type=hidden name="tel-2" value="{{ $contact["tel-2"] }}"/>
                        <input type=hidden name="tel-3" value="{{ $contact["tel-3"] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__content">{{$contact["address"]}}
                        <input type=hidden name="address" value="{{ $contact["address"] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__content">{{$contact["building"]}}
                        <input type=hidden name="building" value="{{ $contact["building"] }}"/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__content">
                        {{--カテゴリが増えたときに対応できない。idから検索してcontentを表示する方法がありそう--}}
                        @switch($contact["category_id"])
                        @case(1)
                            商品のお届けについて
                            @break
                        @case(2)
                            商品の交換について
                            @break
                        @case(3)
                            商品トラブル
                            @break
                        @case(4)
                            ショップへのお問い合わせ
                            @break
                        @case(5)
                            その他
                            @break
                        @endswitch
                        <input type=hidden name="category_id" value="{{ $contact["category_id"] }}"/>
                    </td>
                    </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__content">{{$contact["detail"]}}
                        <input type=hidden name="detail" value="{{ $contact["detail"] }}"/>
                    </td>
                </tr>
            </table>
            <div class="form__button">
                <button class="form__button-submit" name="submit" type="submit">送信</button>
                <button class="form__button-submit--back" name="back" type="submit" value="back">修正</button>
            </div>
        </form>
    </div>
</div>

@endsection
