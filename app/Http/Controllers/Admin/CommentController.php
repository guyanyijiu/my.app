<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function index(){
        return view('admin/comment/index')->withComments(\App\Comment::with('article')->get());
    }

    public function destroy($id){
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors();
    }

    public function edit($id){
        return view('admin/comment/edit')->withComment(\App\Comment::find($id));
    }

    public function update($id, Request $request){
        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');
        if($comment->save()){
            return redirect('admin/comment');
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }
    }
}
