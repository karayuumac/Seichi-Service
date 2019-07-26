@extends('layout')

@section('content')
  <!-- フラッシュメッセージ -->
  @if (session('flash_message'))
    {{-- フラッシュメッセージの表示 --}}
    <div class="alert alert-success">{{ session('flash_message') }}</div>
    <hr>
  @endif

  <div class="text-center">
    <h5>クラウドファンディング一覧</h5>
    <small>現在クラウドファンディングを行なっている全てのプロジェクトを表示しています。</small>
  </div>
  <div class="text-right">
    <a class="btn btn-primary ml-auto" href="{{ route('crowdfunding.create') }}">新規プロジェクト作成</a>
  </div>

  <hr>

  <div class="row">
    @foreach($fundings as $funding)
      <div class="col-12 col-lg-4 mb-3">
        <div class="card border-primary h-100">
          <div class="card-header">{{ $funding->name }}</div>
          <div class="card-body">
            <div class="card-text">{{ mb_substr($funding->description, 0, 200) }}</div>
          </div>

          <?php $progress = $funding->currentAmount() / $funding->target_amount * 100 ?>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                 aria-valuenow="{{ $progress }}"
                 aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%">
              {{ $progress }}%
            </div>
          </div>

          <hr>

          <table class="table table-bordered mb-0 text-center">
            <tbody>
            <tr>
              <th>達成率</th>
              <th>{{ $progress }}% ({{ $funding->currentAmount() }}枚)</th>
            </tr>
            <tr>
              <th>プロジェクト考案者MCID</th>
              <th>{{ $funding->minecraft_id }}</th>
            </tr>
            <tr>
              <th>期限</th>
              <th>{{ $funding->deadline }}(あと{{ $funding->carbonDeadLine()->diffInDays(new \Carbon\Carbon()) }}日)</th>
            </tr>
            </tbody>
          </table>
          <div class="btn-group">
            <a href="{{ route('crowdfunding.support', $funding->id) }}" class="btn btn-primary">支援する</a>
            <a href="{{ route('crowdfunding.show', $funding->id) }}" class="btn btn-secondary">詳細を見る</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection