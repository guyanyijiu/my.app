@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑评论</div>
                    <div class="panel-body">
                        <form action="{{ url('admin/comment/'.$comment->id) }}" method="post" role="form">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="form-nickname">Nickname:</label>
                                <input type="text" class="form-control" id="form-nickname" name="nickname" value="{{ $comment->nickname }}" placeholder="请输入昵称">
                            </div>
                            <div class="form-group">
                                <label for="form-email">Email:</label>
                                <input type="text" class="form-control" name="email" id="form-email" value="{{ $comment->email }}" placeholder="请输入email">
                            </div>
                            <div class="form-group">
                                <label for="form-website">Website:</label>
                                <input type="text" class="form-control" id="form-website" name="website" value="{{ $comment->website }}" placeholder="请输入website">
                            </div>
                            <div class="form-group">
                                <label for="form-content">Content:</label>
                                <textarea rows="10" class="form-control" id="form-content" name="content"  placeholder="请输入内容">{{ $comment->content }}</textarea>
                            </div>
                            <button class="btn btn-default" type="submit">提交修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection