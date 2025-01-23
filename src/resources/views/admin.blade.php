@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="{{asset("css/admin.css")}}" />

@endsection

@section("button")
    <form class="header__form" action="/logout" method="post">
        @csrf
    <button class="header__button inika-regular" onclick="location.href='/login'">logout</button>
    </form>
@endsection

@section("content")
    <div class="admin__content">
        <div class="admin__content-title">
            <h2 class="inika-regular">Admin</h2>
        </div>


        <form class="form__search" action="/contact/search" method="get">
            @csrf
            <div class="admin__search">
                <div class="search__keyword">
                    <input class="keyword__input" type="text" name="keyword"  placeholder="名前やメールアドレスを入力してください" value="{{old("keyword")}}">
                </div>
                <div class="search__gender">
                    <select class="gender__select" name="gender">
                        <option value="0">性別</option>
                        <option value="0">全て</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                </div>
                <div class="search__category">
                    <select class="category__select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{$category["id"]}}"> {{$category["content"]}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="search__date">
                    <input class="date__select" type="date" name="created_at" value="{{ old("created_at") }}">
                </div>
                <div class="search__button">
                    <button class="button-submit" type="submit" name="search">検索</button>
                </div>
                <div class="search__reset">
                    <button class="button-reset" type="reset" name="reset">リセット</button>
                </div>
            </div>
        </form>
        <div class="table__menu">
            <div class="table-list__export">
                <button class="export-button" type="submit" name="export">エクスポート</button>
            </div>
            <div class="pagination">
                {{--対応するcssを持っていないためデザイン表示不可
                    検索結果が反映されなくなる--}}
                {{$contacts->links("vendor.pagination.semantic-ui")}}
            </div>
        </div>
        <div class="contact-table">
            <table class="contact-list">
                <tr class="table__row">
                    <th class="table__header">お名前</th>
                    <th class="table__header">性別</th>
                    <th class="table__header">メールアドレス</th>
                    <th class="table__header">お問い合わせの種類</th>
                    <th class="table__header"></th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="table__row">
                    <td class="table__text">{{$contact["last_name"]}} {{$contact["first_name"]}}</td>
                    <td class="table__text">
                        @switch($contact["gender"])
                            @case(1)
                                男性
                                @break
                            @case(2)
                                女性
                                @break
                            @default
                                その他
                        @endswitch</td>
                    <td class="table__text">{{$contact["email"]}}</td>
                    <td class="table__text">{{$contact["category"]["content"]}}</td>
                    <td class="table__text">
                        <a href="#modal-container{{$contact["id"]}}">詳細</a>
{{--                        <button class="contact-detail" type="submit">詳細</button> --}}
                    </td>
                </tr>
{{--
                <div id="modal-container{{$contact["id"]}}">
                    <div class="modal">
                        <div class="modal__header">
                        <button type="button" class="modai__close" aria-label="閉じる">
                        </button>
                        </div>
                        <div class="modal__content">
                            <p>名前　{{$contact["first_name"]}}</p>
                        </div>
                    </div>
                </div>
--}}

                @endforeach
            </table>
        </div>

        <div id="modal-container">
                    <div class="modal">
                        <div class="modal__close">
                            <a href="#" aria-label="Close Modal"><i class="fa fa-times">
                        </div>
                        <div class="modal__detail">
                            <table class="modal__table">
                                <tr>
                                    <th class="modal__header">お名前</th>
                                    <td class="modal__content">山田　太郎</td>
                                </tr>
                            </table>
                        </div>
                    </div>
        </div>

    </div>

@endsection
