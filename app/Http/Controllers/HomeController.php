<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function save(Request $request)
    {
        // dd($request->all());


         $prompt1 = `I am writing a resume, my details are \n name: {$request->fullName} \n role: {$request->currentPosition} ({$request->currentLength} years). \n I write in the technolegies: {$request->currentTechnologies}. Can you write a 100 words description for the top of the resume(first person writing)?`;
        //👇🏻 The job responsibilities prompt
        $prompt2 = `I am writing a resume, my details are \n name: {$request->fullName} \n role: {$request->currentPosition} ({$request->currentLength} years). \n I write in the technolegies: {$request->currentTechnologies}. Can you write 10 points for a resume on what I am good at?`;
        //👇🏻 The job achievements prompt

        $this->GPTFunction($prompt1);


        
        

    }




    public function GPTFunction($text)
    {
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $complete = $open_ai->completion([
            'model' => 'davinci',
            'prompt' => $text,
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);

        $data = json_decode($complete);

        return $data->choices[0]->text;

    }

    
}
