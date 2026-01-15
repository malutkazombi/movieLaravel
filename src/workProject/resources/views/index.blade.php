@extends('layout')

@section('title', 'ホーム')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">映画管理システムへようこそ</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">機能</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"> 🆗映画情報の保存（タイトル、ジャンル、公開年、画像、評価）</li>
                    <li class="mb-2"> 映画一覧の表示（評価順での並び替え可能）</li>
                    <li class="mb-2"> 映画の追加・編集・削除</li>
                    <li class="mb-2"> ユーザー認証（ログイン・会員登録）</li>
                </ul>
                <div class="mt-4">
                    <tbody>
                        @foreach($movies as $movie)
                        <tr>
                            <h2>{{ $movie->title }}</h2>
                            <td>
                                release year</br>
                                <span class="label">{{ $movie->release_year }}</span></br>
                                genre</br>
                                <span class="label">{{ $movie->genre }}</span></br>
                                Rating</br>
                                <span class="label">{{ $movie->rating }}</span></br>
                                <span class="label">{{ $movie->image }}</span></br>
                            </td>
                            <td><a href="#">編集</a></td>
                            <td><a href="#">削除</a></td></br></br>
                        </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
