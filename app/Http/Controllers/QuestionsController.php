<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;


class QuestionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Questions();

        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title','body'));
        return redirect()->route('questions.index')->with('success','Your Question has been posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions $question)
    {
        // if(\Gate::denies('update-question', $question)){
        //     return abort(403, 'Access dinied');
        // }
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Questions $question)
    {
        //
        $question->update($request->only('title','body'));

        return redirect('/questions')->with('success',"Your Question has been successfully Updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $question)
    {
        // if(\Gate::denies('delete-question', $question)){
        //     return abort(403, 'Access dinied');
        // }
        $this->authorize('delete', $question);
        $question->delete();
            return redirect('/questions')->with('success', 'Your questions has been deleted'); 
    }
}
