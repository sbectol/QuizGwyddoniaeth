<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Question;

class OptionsController extends Controller
{
    public function index()
    {
        $options  = Option::all();
        return view('options.index', compact('options'));
    }
    public function show(Option $Option)
    {

        return view('options.show', compact('option'));
    }

    public function create()
    {
        return view('options.create');
    }
    public function edit($id, Request $request){

        $option = Option::find($id);

        if($option->user_id == auth()->id() || $request->user()->hasAnyRole(['Gweinyddwr', 'Rheolwr']) ) {

        return view('options.edit', ['option' => $option]);

        } else {

            abort(401, 'This action is unauthorized.');

        }
    }
    public function update($id, Request $request){

        $this->validate($request, [

            'body' => 'required'

            ]);

        $optionData = $request->all();

        $yesno = ( isset($optionData['correct']) ) ? 1 : 0;

        $optionData['correct']=$yesno;

        $questionId = Option::find($id);

        if($yesno){
            Option::where('question_id', $questionId->question_id)
                ->update(['correct' => 0]);
        }

        Option::find($id)->update($optionData);

        return redirect('/questions');

    }

    public function store()
    {
        $this->validate(request(),   [
            'body' => 'required'
             ]);
        // Option::create(request(['body','user_id','question_id']));

        $data = new Option;
        $data->body = request('body');
        if(request('correct')){
        $data->correct = 1;
        } else {
        $data->correct = 0;
        }
        $data->question_id = request('question_id');

        $data->save();


        $id['question_id'] = request('question_id');

        $id['option_number'] = request('option_number') + 1;

        if  ($id['option_number'] < 4) {
        return redirect('/options/create')->with('data', $id);
        } else {
        return redirect('/questions');
        }


    }
}
