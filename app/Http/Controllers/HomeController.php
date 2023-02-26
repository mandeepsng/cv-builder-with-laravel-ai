<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use Illuminate\Support\Facades\File;

use Goutte\Client;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Symfony\Component\HttpClient\HttpClient;

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


    public function index_for_codlist()
    {
        return view('codelist');
    }
    
    /**
     * make_md
     *
     * @return void
     */
    public function make_md(Request $request)
    {

        // dd($request->url);
        $client = new Client();
        // $crawler = $client->request('GET', 'https://codelist.cc/wpplugins/249647-learndash-v4511-learning-management-system-for-wordpress.html');
        $crawler = $client->request('GET', $request->url);
        // dd($crawler);
        
        $title = $crawler->filter('.entry-title')->text();
        $body = $crawler->filter('body')->text();
        $quote = $crawler->filter('.quote')->text();
        
        // $div = $crawler->filter('div.single-body');
        // $descripton = $div->text();
        
        $texts = [];
        
        // Find all the links using regular expressions
        preg_match_all('/https?:\/\/\S+/', $quote, $matches);
        
        // Join the matches into a single string
        $joinedLinks = implode('', $matches[0]);
        
        // Split the joined links into an array
        $linksArray = explode('http', $joinedLinks);
        
        // Add 'http' to the beginning of each link
        foreach ($linksArray as &$link) {
            $link = 'http' . $link;
        }
        
        // Remove the first empty element of the array
        array_shift($linksArray);
        
        // Print the resulting array
        // dd($linksArray);
        
        
        
        // descrition

        $input = $crawler->filter('div.single-body')->text();
        // $text = $div->filter(':not(a)')->text();
        // echo $text;
        // $input = "this is a string to remove some text from";
        $toRemove = $quote;
        $descripton = str_replace($toRemove, "", $input);

        $imageUrl = "https://codelist.cc/".$crawler->filter('div.single-body img')->first()->attr('src');



        $currentDate = Carbon::now();

        $formattedDate = $currentDate->format('Y-m-d');

        $save_path ='/app/'.$formattedDate.'/'.$title.'.md';
        Storage::makeDirectory($formattedDate);

        // echo '/app/'.$formattedDate.'/'.$title.'md';


        // Create the Markdown content
        $content = "# Hello, world!\n\nThis is a Markdown file created in Laravel.";

        // Write the content to a file
        // File::put(storage_path($save_path), $content);

        // $content = Storage::disk('local')->get('example.md');

        $date = Carbon::now()->toISOString();
        $slug = Str::slug($title);



        $post = "---";
        $post .= "\n";
        $post .= 'title: '.$title;
        $post .= "\n";
        $post .= 'date: '.$date;
        $post .= "\n";
        $post .= 'slug: '.$slug;
        $post .= "\n";
        $post .= 'image: '.$imageUrl;
        $post .= "\n";
        $post .= "---";
        $post .= "\n\n\n\n";
        
        $post .= $descripton;
        $post .= "\n";

        // foreach( $linksArray as $k => $v ){
        //     if($k == 0){
        //         $post .= "\n";
        //         $post .= " > [*".$v;
        //     }
        //     $post .= "\n";
        //     $post .= " > ".$v;
        // }
        foreach( $linksArray as $k => $v ){
            $post .= "\n";
            $post .= " > [".$v."](".$v.")";
            $post .= "\n";
            // $post .= "[";
        }
        // $post .= "*](";
        // $post .= implode(' ', $linksArray);
        // $post .= ")";
        // $post .= "\n";
        


        // $parse_html = htmlspecialchars($post);
       $created = File::put(storage_path($save_path), $post);

        echo $created;

        if($created){
            // return view('codelist', compact('created'));
            return redirect()->back()->with('success', 'Your action was successful!');

        }


        // dd($title, $descripton, $linksArray, $imageUrl);        
    }



    public function bulk_codlist_md_file_generate()
    {

        $client = new Client();
        
        $crawler = $client->request('GET', 'https://codelist.cc/pg/3/');

        $texts = [];
        // $links = [];

        $elements = $crawler->filter('.post__title .typescale-2')->text();

        // loop through each element and find all anchor tags with href attributes
        $links = array();
        $elements->each(function ($element) use (&$links) {
            $anchorTags = $element->filter('a[href]');
            $anchorTags->each(function ($anchorTag) use (&$links) {
                $href = $anchorTag->attr('href');
                $links[] = $href;
            });
        });



        dd($elements, 'ddd');
    }
    
}
