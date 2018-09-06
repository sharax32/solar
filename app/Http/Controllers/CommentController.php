<?php

namespace App\Http\Controllers;


use App\Comment;
use App\Http\Requests\StoreComment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     *
     * Получаем дерево комментариев
     */
    public function index()
    {

        $comments = Comment::where('parent_id',0)->get();

        foreach ($comments as $comment) {
            $children = $comment->children()->get()->toArray();
            $comment->children = $children;
        }

        return $comments;
    }

    public function show(Comment $comment)
    {

        return $comment;

    }

    public function store(StoreComment $request)
    {
        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    public function update(Comment $comment, Request $request)
    {
        $data = $request->all();
        $comment->update($data);

        return response()->json($comment, 200);
    }

    public function delete(Comment $comment)
    {
        $children = $comment->children()->get();
        self::delChildren($children);
        $comment->delete();

        return response()->json(null, 204);

    }

    /**
     * Удаляем вложженые комментарии
     * @param $childs
     */
    private function delChildren($childs)
    {

        foreach ($childs as $child) {
            $childnext = $child->children;
            if (!($childnext->isEmpty())) {

                self::delChildren($childnext);

            }
            $child->delete();
        }

    }


}

