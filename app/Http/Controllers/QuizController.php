<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;




class QuizController extends Controller
{
    //
    public function getQuestion($id){
		$question = Question::find($id);
        return $question->body;
    }

    public function getOptions($id){
		$options = Option::orderByRaw('RAND()')->where('question_id','=',$id)->get();
		return $options;
    }

    public function getIds() {
        $questions = Question::orderByRaw('RAND()')->select('id')->take(10)->where('approved','=',1)->get();
        return $questions;

    }

    public function getQuiz()
    {


        $questions = Question::orderByRaw('RAND()')->take(10)->get();

        foreach($questions as $question){

            $options[$this->getQuestion($question->id)][] = Options::where('question_id','=',$question->id)->select('id','body','question_id','correct')->get();
		}


        return view('quiz')->with(['questions' => $options]);


    }

    public function getSingle($id) {

       $question['question']=$this->getQuestion($id);
       $question['option']=$this->getOptions($id);

        return $question;


    }

    public function result(Request $req) {
        $input = $req->all();
        $array_of_options = $input['option'];
        foreach($array_of_options as $key => $value){
        //$key is question_id value is option_id
        $options[$value][$this->getQuestion($key)] = \DB::table('options')->where('question_id','=',$key)->select('id','body','question_id','correct'   )->get();
            }


            return view('results')->with(['responses' => $options]);
    }
}
