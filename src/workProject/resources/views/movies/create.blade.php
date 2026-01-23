@extends('layout')

@section('title', 'ホーム')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endsection

@section('content')
<div class="col col-md-offset-3 col-md-6">
  <nav class="panel panel-default">
    <div class="panel-heading">映画を追加する</div>
    <div class="panel-body">
      <form action="{{ route('movies.create') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">映画名</label>
          <input type="text" class="form-control" name="title" id="title" />
          <label for="genre">映画ジャンル</label>
          <select class="form-control" name="genre" id="genre">
            <option value="">選択してください</option>
            <option value="action">Action</option>
            <option value="comedy">Comedy</option>
            <option value="drama">Drama</option>
            <option value="horror">Horror</option>
            <option value="sci-fi">Sci-Fi</option>
            <option value="thriller">Thriller</option>
            <option value="romance">Romance</option>
            <option value="animation">Animation</option>
          </select>
          <label for="release_year">映画公開年</label>
          <input type="month" class="form-control" name="release_year" id="release_year" />
          <label for="rating">映画評価</label>
          <div class="rating-slider-container">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <span class="text-muted small">0</span>
              <div class="text-center">
                <label for="rating" class="form-label mb-0">
                  <strong>評価: <span id="rating-value" class="text-primary">5</span>/10</strong>
                </label>
              </div>
              <span class="text-muted small">10</span>
            </div>
            <input type="range" class="form-range" name="rating" id="rating" min="0" max="10" step="1" value="5" />
            <div class="d-flex justify-content-between mt-1">
              @for($i = 0; $i <= 10; $i++)
                <span class="text-muted" style="font-size: 0.7rem;">{{ $i }}</span>
                @endfor
            </div>
          </div>
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </nav>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/movies.js') }}"></script>
@endsection
