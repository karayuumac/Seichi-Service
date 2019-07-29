@extends('layout')

@section('content')
  <script>
    function autoLink() {
        location.href = "{{ route('index') }}"
    }
    setTimeout(autoLink, 5000);
  </script>
  <div class="row">
    <div class="col-12">
      <div class="text-center">送信終了です。お問い合わせありがとうございました。</div>
      <div class="text-center">5秒後にメインページにリダイレクトします。</div>
      <div class="text-center">リダイレクトしない場合は<a href="{{ route('index') }}">こちらから</a></div>
    </div>
  </div>
@endsection