@extends('layout')

@section('title', 'ホーム')

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
          <input type="range" class="form-control" name="rating" id="rating" min="0" max="10" />
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
    </div>
  </nav>
</div>
@endsection
