@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">评论管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Content</th>
                                    <th>User</th>
                                    <th>Page</th>
                                    <th>编辑</th>
                                    <th>删除</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->nickname }}</td>
                                    <td>{{ $comment->article->title }}</td>
                                    <td><a href="{{url('admin/comment/'. $comment->id .'/edit')}}" class="btn btn-success">编辑</a></td>
                                    <td>
                                        <form action="{{url('admin/comment/'.$comment->id)}}" method="post" style="">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection