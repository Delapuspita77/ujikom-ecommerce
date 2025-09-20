<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedbacks;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedbacks::with('user')->latest()->get();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function destroy(Feedbacks $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback deleted!');
    }
}
