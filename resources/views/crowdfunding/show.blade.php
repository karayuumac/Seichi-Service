@extends('layout')

@section('content')
  <div class="row">
    <div class="col-10 mx-auto">
      <div class="text-center">
        <h5>プロジェクトの詳細</h5>
        <small>プロジェクトの詳細を見ることができます。</small>
      </div>

      <hr>

      <div class="card border-primary">
        <div class="card-header text-center">
          プロジェクト「{{ $funding->name }}」の詳細
        </div>
        <div class="card-body">
          <div class="list-group list-group-flush">
            <div class="list-group-item">
              <h5 class="card-title"><strong>・プロジェクトの説明</strong></h5>
              {{ $funding->description }}
            </div>
            <div class="list-group-item">
              <h5 class="card-title"><strong>・支援状態</strong></h5>
              <?php $progress = $funding->currentAmount() / $funding->target_amount * 100 ?>
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                     aria-valuenow="{{ $progress }}"
                     aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%">
                  {{ $progress }}%
                </div>
              </div>
              達成率:{{ $progress }}% ({{ $funding->currentAmount() }}枚)
              必要枚数:{{ $funding->target_amount }}枚
              <div class="ml-auto">
                <a href="{{ route('crowdfunding.support', $funding->id) }}" class="btn btn-primary @if($funding->isExpired()) disabled @endif">
                  このプロジェクトを支援する
                </a>
                @if($funding->isExpired())
                  <!-- プロジェクトの期限切れの時 -->
                  <i class="fas fa-question-circle" aria-hidden="true" data-toggle="tooltip"
                     data-original-title="このプロジェクトは支援可能期限が過ぎているため支援できません。"></i>
                @endif
              </div>
            </div>
            <div class="list-group-item">
              <h5 class="card-title"><strong>・各種情報</strong></h5>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>プロジェクト考案者のMinecraft ID</th>
                    <th>{{ $funding->minecraft_id }}</th>
                  </tr>
                  <tr>
                    <th>資金援助の期限</th>
                    <th>{{ $funding->deadline }}</th>
                  </tr>
                  <tr>
                    <th>期限まで残り日数</th>
                    <th>{{ $funding->carbonDeadline()->diffInDays(new \Carbon\Carbon()) }}日</th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="list-group-item">
              <div class="card-title"><strong>・支援者</strong></div>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">日付・時刻</th>
                    <th class="text-center">支援者のMinecraft ID</th>
                    <th class="text-center">支援額</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($donations as $donation)
                    <tr>
                      <th class="text-center">{{ $donation->created_at }}</th>
                      <th class="text-center">{{ $donation->minecraft_id }}</th>
                      <th class="text-center">{{ $donation->donation_amount }}枚</th>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="list-group-item">
              <div class="card-title"><strong>・広告</strong></div>
              <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <!-- プロジェクト詳細ページ広告 -->
              <ins class="adsbygoogle"
                   style="display:block"
                   data-ad-client="ca-pub-7904110007301903"
                   data-ad-slot="4844414830"
                   data-ad-format="auto"
                   data-full-width-responsive="true"></ins>
              <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection