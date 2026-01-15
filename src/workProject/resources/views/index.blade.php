@extends('layout')

@section('title', 'ホーム')

@section('content')
<section class="mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="card-title h5 mb-0">システム機能</h2>
        </div>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <li class="mb-3">
                    <strong>👌映画情報の保存</strong>（タイトル、ジャンル、公開年、画像、評価）
                </li>
                <li class="mb-3">
                    <strong>👌映画一覧の表示</strong>（評価順での並び替え可能）
                </li>
                <li class="mb-3">
                    <strong>映画の追加・編集・削除</strong>
                </li>
                <li class="mb-0">
                    <strong>ユーザー認証</strong>（ログイン・会員登録）
                </li>
            </ul>
        </div>
    </div>
</section>

@if($movies->count() > 0)
<section aria-labelledby="movies-heading">
    <h2 id="movies-heading" class="h3 mb-4">登録されている映画</h2>
    <div class="row g-4">
        @foreach($movies as $movie)
        <article class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                @if($movie->image)
                <img src="{{ $movie->image }}" alt="{{ $movie->title }}のポスター" class="card-img-top" style="height: 300px; object-fit: cover;">
                @else
                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 300px;">
                    <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title h5 mb-3">{{ $movie->title }}</h3>
                    <dl class="row mb-3 flex-grow-1">
                        <dt class="col-sm-5">公開年</dt>
                        <dd class="col-sm-7">{{ $movie->release_year }}</dd>

                        <dt class="col-sm-5">ジャンル</dt>
                        <dd class="col-sm-7">
                            <span class="badge bg-secondary">{{ $movie->genre }}</span>
                        </dd>

                        <dt class="col-sm-5">評価</dt>
                        <dd class="col-sm-7">
                            <span class="badge bg-warning text-dark">{{ $movie->rating }}/10</span>
                        </dd>
                    </dl>
                    <div class="mt-auto">
                        <div class="btn-group w-100" role="group" aria-label="映画の操作">
                            <a href="{{ route('movies.edit', $movie) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i> 編集
                            </a>
                            <a href="{{ route('movies.delete', $movie) }}" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i> 削除
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>
@else
<section class="text-center py-5">
    <div class="card shadow-sm">
        <div class="card-body py-5">
            <i class="bi bi-film text-muted" style="font-size: 4rem;"></i>
            <h2 class="h4 mt-3 mb-3">まだ映画が登録されていません</h2>
            <p class="text-muted mb-4">最初の映画を追加してみましょう！</p>
            <a href="{{ route('movies.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> 映画を追加
            </a>
        </div>
    </div>
</section>
@endif
@endsection

@section('styles')
<style>
    dt {
        font-weight: 600;
        color: #6c757d;
    }
</style>
@endsection
