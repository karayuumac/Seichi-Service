@extends('layout')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/main/index.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-12 col-lg-10">
    <div class="card border-primary">
      <div class="card-header">
        <i class="fa fa-info-circle fa-fw"></i>
        お知らせ
      </div>

      <div class="card-body">
        <div class="card-group">
          <!-- お知らせの中身 /-->
          <div class="card">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              ホームページを開設しました
              <span style="font-size: 1px">posted 2019/7/20(Sat) 15:35 by karayuu</span>
            </div>
            <div class="card-body">
              <p>

              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-2">
    広告スペースですよ
  </div>
</div>
@endsection