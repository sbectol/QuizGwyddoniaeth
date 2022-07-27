<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

use App\Models\Option;


class QuestionsController extends Controller
{

    // public function __construct ()

    // {

    //     $this->middleware('auth');

    // }


    public function index()

    {

        $questions  = Question::latest()->get();

        return view('questions.index', ['questions' => $questions, 'approved' => false]);

    }

    public function approved(Request $request)

    {



        $questions  = Question::approved()->latest()->get();


        return view('questions.index', ['questions' => $questions, 'approved' => true]);

    }

    public function show(Question $question)

    {

        return view('questions.show', compact('question'));
    }

    public function create(Request $request)

    {



        return view('questions.create');

    }

    public function deleteConfirm($id) {

        $question = Question::find($id);

        $options = Option::where('question_id', $id)->get();

        return view('questions.delete', ['question'=>$question, 'options' => $options]);

    }

    public function delete($id, Request $request)
    {

        $question = Question::find($id);



            $deleted = Question::destroy($id);

            $deleteded_options = Option::where('question_id', $id)->delete();

            return redirect('/');

    }

    public function edit($id, Request $request ){

        $question = Question::find($id);




            $options = Option::where('question_id', $id)->get();

            return view('questions.edit', ['question' => $question, 'options' => $options]);


    }

    public function update($id, Request $request){

        $this->validate($request, [

            'body' => 'required'

            ]);

        $questionData['body'] = $request->body;



            $questionData['approved'] =  $request->approved;

            $yesno = ( isset($questionData['approved']) ) ? 1 : 0;

            $questionData['approved'] = $yesno;

            $questionData['approved_by'] = auth()->id();

            $optionData = $request->option_id;

                foreach($optionData as $option_id) {

                    $option = Option::find($option_id);

                    $option->approved = $yesno;

                    $option->save();

                }



        Question::find($id)->update($questionData);



        return redirect('/');
    }

    public function store(Question $question)
    {
        # code...

        $this->validate(request(),   [
             'body' => 'required'
              ]);



        $data = new Question;
        $data->body = request('body');



        $data->save();
        $id['question_id']= $data->id;
        $id['option_number'] = 1;

        return redirect('/options/create')->with('data', $id);


    }
}
