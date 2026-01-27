@extends('layout')

@section('title', '映画を削除する')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endsection

@section('content')
<div class="col col-md-offset-3 col-md-6">
  <nav class="panel panel-default">
    <div class="panel-heading">映画を削除する</div>
    <div class="panel-body">
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">
          <i class="bi bi-exclamation-triangle"></i> 確認が必要です
        </h4>
        <p class="mb-0">
          <strong>{{ $movie->title }}</strong> を削除してもよろしいですか？
        </p>
        <p class="mb-0 mt-2">
          <small>この操作は取り消せません。</small>
        </p>
      </div>

      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title mb-3">削除する映画の情報</h5>
          <dl class="row mb-0">
            @if($movie->image)
            <div class="mb-3 text-center">
              <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }}のポスター" class="img-thumbnail" style="max-height: 200px; object-fit: cover;">
            </div>
            @else
            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 300px;">
              <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
            </div>
            @endif
            <dt class="col-sm-4">映画名</dt>
            <dd class="col-sm-8"><strong>{{ $movie->title }}</strong></dd>

            <dt class="col-sm-4">ジャンル</dt>
            <dd class="col-sm-8">
              <span class="badge bg-secondary">{{ $movie->genre }}</span>
            </dd>

            <dt class="col-sm-4">公開年</dt>
            <dd class="col-sm-8">{{ $movie->release_year }}</dd>

            <dt class="col-sm-4">評価</dt>
            <dd class="col-sm-8">
              <span class="badge bg-warning text-dark">{{ $movie->rating }}/10</span>
            </dd>
          </dl>
        </div>
      </div>

      <form action="{{ route('movies.delete', $movie->id) }}" method="post">
        @csrf
        <div class="d-flex justify-content-between">
          <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle"></i> キャンセル
          </a>
          <button type="submit" class="btn btn-danger">
            <i class="bi bi-trash"></i> 削除する
          </button>
        </div>
      </form>
    </div>
  </nav>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/movies.js') }}"></script>
@endsection
