<?php

namespace App\Http\Controllers;

use App\Question;
use App\Form;
use App\QuestionOption;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $form = Form::find($id);
        $questions = Question::where('form_id',$id)->get();
        return view('question',compact('form','questions'));
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
    public function store(Request $request, $id)
    {
        $questions = Question::where('form_id',$id)->get();
        $count = count($questions);
        $question = new Question();
        $question->form_id = $id;
        $question->question = "Default Question ".($count + 1);
        $question->type = "Multiple Choice";
        // $option = new QuestionOption(['option'=>'Option 1']);
        $question->save();
        // $question->options()->save($option);

        // $response['data']=$question
        // $response['option']=$option
        return response()->json($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function updateType(Request $request, Question $question, $id, $value)
    {
        $question = Question::find($id);
        $question->type = $value;
        $question->save();
        return response()->json($question);
    }
    public function updateTitle(Request $request, Question $question, $id)
    {
        $question = Question::find($id);
        $question->question = $request->value;
        $question->save();
        return response()->json($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, $id, $question_id)
    {
        $question = Question::findOrFail($question_id)->delete();
        return redirect('/form/'.$id.'/question');
    }
}
