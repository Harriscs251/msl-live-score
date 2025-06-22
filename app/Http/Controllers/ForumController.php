<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\DiscussionReply;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $discussions = Discussion::with('user')
            ->withCount('replies')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('forum.index', compact('discussions'));
    }
    
    public function create()
    {
        return view('forum.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $discussion = Discussion::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'content' => $request->content,
        ]);
        
        return redirect()->route('forum.show', $discussion)
            ->with('success', 'Discussion started successfully!');
    }
    
    public function show(Discussion $discussion)
    {
        // Load the discussion with user, replies and reply users
        $discussion->load(['user', 'replies.user']);
        
        return view('forum.show', compact('discussion'));
    }
    
    public function reply(Request $request, Discussion $discussion)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        
        // Don't allow replies to blocked discussions
        if ($discussion->is_blocked) {
            return back()->with('error', 'This discussion has been blocked by an administrator.');
        }
        
        DiscussionReply::create([
            'discussion_id' => $discussion->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);
        
        return redirect()->route('forum.show', $discussion)
            ->with('success', 'Reply posted successfully!');
    }
}