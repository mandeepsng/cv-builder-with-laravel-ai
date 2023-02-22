<?php

use Illuminate\Support\Facades\Route;
use Orhanerday\OpenAi\OpenAi;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/data', [HomeController::class, 'save'])->name('save');

Route::get('/44', function () {


    // $open_ai = new OpenAi(env('OPENAI_API_KEY'));

    //     $opts = [
    //     'prompt' => "Hello",
    //     'temperature' => 0.9,
    //     "max_tokens" => 150,
    //     "frequency_penalty" => 0,
    //     "presence_penalty" => 0.6,
    //     "stream" => true,
    //     ];

    //     header('Content-type: text/event-stream');
    //     header('Cache-Control: no-cache');

    //     $open_ai->completion($opts, function ($curl_info, $data) {
    //     echo $data . "<br><br>";
    //     echo PHP_EOL;
    //     ob_flush();
    //     flush();
    //     return strlen($data);
    //     });



//     $open_ai_key = getenv('OPENAI_API_KEY');
//     $open_ai = new OpenAi($open_ai_key);

//     $complete = $open_ai->completion([
//         'model' => 'davinci',
//         'prompt' => 'Hello',
//         'temperature' => 0.9,
//         'max_tokens' => 150,
//         'frequency_penalty' => 0,
//         'presence_penalty' => 0.6,
//     ]);

// var_dump($complete);


    return view('test');
});
