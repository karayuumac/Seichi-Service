@extends('layout')

@section('content')
  <div class="row">
    <div class="col col-md-4">
      <nav class="card">
        <div class="card-header">フォルダ</div>
        <div class="card-body">
          <a href="{{ route('folders.create') }}" class="btn btn-outline-secondary btn-block">
            フォルダを追加する
          </a>
        </div>
        <div class="list-group">
          @foreach($folders as $folder)
            <a href="{{ route('tasks.index', ['id' => $folder->id]) }}"
               class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : ''}}">
              {{ $folder->title }}
            </a>
          @endforeach
        </div>
      </nav>
    </div>
    <div class="col col-md-8">
      <!-- ここにタスクが表示される -->
      <div class="card">
        <div class="card-header">タスク</div>
        <div class="card-body">
          <div class="text-right">
            <a href="#" class="btn btn-outline-secondary btn-block">
              タスクを追加する
            </a>
          </div>
        </div>
        <table class="table">
          <thead>
          <tr>
            <th class="text-center">タイトル</th>
            <th class="text-nowrap text-center">状態</th>
            <th class="text-center">期限</th>
            <th class="text-center"></th>
          </tr>
          </thead>
          <tbody>
          @foreach($tasks as $task)
            <tr>
              <td class="text-center">{{ $task->title }}</td>
              <td class="text-center">
                <span class="badge {{ $task->status_class }}">{{ $task->status_label }}</span>
              </td>
              <td class="text-center">{{ $task->due_date }}</td>
              <td class="text-center"><a href="#">編集</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection