<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

     /**
         * Create a new controller instance.
         *
         * @return void
         */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentUnApproved = Comment::UnApproved()->get()->count();
        $commentApproved = Comment::Approved()->get()->count();
        $commentNoApproved = Comment::NoApproved()->get()->count();
        $commentsAll = Comment::all()->count();

        $comments = Comment::all();

        return view('admin.comment.index', compact('comments','commentUnApproved','commentsAll','commentApproved', 'commentNoApproved'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment, $status)
    {

        $commentUnApproved = Comment::UnApproved()->get()->count();
        $commentApproved = Comment::Approved()->get()->count();
        $commentNoApproved = Comment::NoApproved()->get()->count();
        $commentsAll = Comment::all()->count();

        switch ($status) {
            case 'unapproved':
               $comments =  Comment::whereHas('status',function($query){
                    $query->where('id',1);
                })->get();
                break;
             case 'approved':
                $comments =  Comment::whereHas('status',function($query){
                    $query->where('id',2);
                })->get();
                break;
                 case 'noapproved':
                $comments =  Comment::whereHas('status',function($query){
                    $query->where('id',3);
                })->get();
                break;
            default:
                 $comments = Comment::all();
                break;
        }
        return view('admin.comment.index', compact('comments','commentUnApproved','commentsAll','commentApproved', 'commentNoApproved'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', "Comment deleted successfully");
    }

    public function changeStatus(Comment $comment)
    {
        $comment->status_id = request()->get('status_id');
        $comment->update();

         return back();
    }
}
