@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    My tasks
                    <a class="pull-right" href="/tasks/create">New</a>
                </div>
                <div class="panel-body">
                    <ul>
                        @foreach ($todo as $task)
                            <li>
                                <strong>{{ $task->title }}</strong>
                                <form method="POST" action="/tasks/done/{{ $task->id }}" style="display:inline-block;">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    <button type="submit" class="btn btn-link">
                                        <small>DONE</small>
                                    </button>
                                </form>
                            </li>
                            <p>{{ $task->description }}</p>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
