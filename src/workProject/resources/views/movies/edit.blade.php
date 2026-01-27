@extends('layout')

@section('title', 'ホーム')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/movies.css') }}">
@endsection

@section('content')
<div class="col col-md-offset-3 col-md-6">
  <nav class="panel panel-default">
    <div class="panel-heading">映画を編集する</div>
    <div class="panel-body">
      <form action="{{ route('movies.edit', $movie->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          @if($movie->image)
          <div class="mb-3">
            <label>現在のポスター</label>
            <img src="{{ asset('storage/' . $movie->image) }}" alt="{{ $movie->title }}のポスター" class="img-thumbnail" style="max-height: 200px; object-fit: cover;">
          </div>
          @endif
          <label for="image">映画ポスター{{ $movie->image ? '（変更する場合）' : '' }}</label>
          <input type="file" class="form-control" name="image" id="image" accept="image/*">
          <label for="title">映画名</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ $movie->title }}" />
          <label for="genre">映画ジャンル</label>
          <select class="form-control" name="genre" id="genre">
            <option value="">選択してください</option>
            <option value="action" {{ $movie->genre == 'action' ? 'selected' : '' }}>Action</option>
            <option value="comedy" {{ $movie->genre == 'comedy' ? 'selected' : '' }}>Comedy</option>
            <option value="drama" {{ $movie->genre == 'drama' ? 'selected' : '' }}>Drama</option>
            <option value="horror" {{ $movie->genre == 'horror' ? 'selected' : '' }}>Horror</option>
            <option value="sci-fi" {{ $movie->genre == 'sci-fi' ? 'selected' : '' }}>Sci-Fi</option>
            <option value="thriller" {{ $movie->genre == 'thriller' ? 'selected' : '' }}>Thriller</option>
            <option value="romance" {{ $movie->genre == 'romance' ? 'selected' : '' }}>Romance</option>
            <option value="animation" {{ $movie->genre == 'animation' ? 'selected' : '' }}>Animation</option>
          </select>
          <label for="release_year">映画公開年</label>
          <input type="month" class="form-control" name="release_year" id="release_year" value="{{ $movie->release_year ? date('Y-m', strtotime($movie->release_year)) : '' }}" />
          <label for="rating">映画評価</label>
          <div class="rating-slider-container">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <span class="text-muted small">0</span>
              <div class="text-center">
                <label for="rating" class="form-label mb-0">
                  <strong>評価: <span id="rating-value" class="text-primary" ">5</span>/10</strong>
                </label>
              </div>
              <span class=" text-muted small">10</span>
              </div>
              <input type="range" class="form-range" name="rating" id="rating"
                min="0" max="10" step="1" value="{{ $movie->rating ?? 5 }}" />
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
