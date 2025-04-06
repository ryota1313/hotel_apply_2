<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('question.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:20',
        'email' => 'required|email',
        'title' => 'required|string|max:255',
        'body' => 'required',
    ]); 

    // データ保存
    $question = Question::create($validated);

    // 保存後に詳細ページへリダイレクト（ID渡す）
    return redirect()->route('question.thankyou');
}

public function show(Question $question)
{
    return view('question.show');
}

public function thankyou()
{
    return view('question.thankyou');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
