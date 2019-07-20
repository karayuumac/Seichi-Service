@extends('layout')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card border-primary">
      <div class="card-header">
        <i class="fa fa-info-circle fa-fw"></i>
        お知らせ
      </div>

      <div class="card-body">
        <div class="card-group">
          <!-- お知らせの中身 -->
          <div class="card">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              ホームページを開設しました<br>
              <span class="small">posted 2019/7/20(Sat) 17:35 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                ホームページを開設しました。<br>
                現在制作中のため、<a href="#">このページ</a>のみが完成しています。<br>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection