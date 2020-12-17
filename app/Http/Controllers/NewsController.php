<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use PDF;
use Mail;

class NewsController extends Controller
{

    public function create(){
        return view('news.create');
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];
        $request->validate($rules);
        $path = $this->uploadImage($request);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
            'user_id' => 1

        ]);

        return redirect()->route('index');
    }

    public function edit($id){
        $article = Post::find($id);
        return view('news.edit',compact('article'));
    }

    public function update(Request $request){
        Post::where('id',$request->article)->update($request->except(['_token','article']));
        return redirect()->route('index');
    }

    public function delete($id){
        Post::find($id)->delete();

        return redirect()->route('index');
    }

    public function deleteNews(Request $request){
        Post::find($request->id)->delete();
        $data['status'] = 'OK';

        return response()->json($data,200);
    }


     private function uploadImage(Request $request) {
        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }

        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }

        $path = '/uploads/'.$file->getClientOriginalName();


        $file->move('uploads', $file->getClientOriginalName());
        return $path;
    }

    public function index(){
        $news = Post::all();

        return view('news.index',compact('news'));
    }

    public function show($id){
        $post = Post::find($id);

        return view('news.show',compact('post'));
    }


    public function generatePDF(){
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->download('test.pdf');
    }



    public function sendEmail(){
        $emails = [];
        return Mail::send('emails.test', [], function ($message) use($emails){
            $message->from('webobuka.nahla@gmail.com');
            $message->to('azra.piric@outlook.com')->subject('Test email');
            $message->cc([$emails]);
            $message->bcc([]);
        });
    }

    public function home(){
        $news = Post::orderBy('id','DESC')->take(3)->get();
        return view('home', compact('news'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        //check if method is POST or use keyword from GET method
        if (isset($keyword)) {
            if (strlen($keyword) < 4) {
                $message = 'Za pretragu molimo unesite minimalno 4 karaktera';
                return view('search', compact('message'));
            }else{
                $data = Post::where('title','LIKE','%'.$keyword.'%')->orWhere('content','LIKE','%'.$keyword.'%')->get();
                return view('search',compact('data'));
            }

        } else {
            return redirect()->route('home');
        }

    }

    public function showPost($id){
        $post = Post::find($id);
        return view('post',compact('post'));
    }

   public function logging(){

             if(file_exists("test.txt")){
                 $file = fopen("test.txt","a");
                    $text = "Moj prvi log".PHP_EOL;
                    fwrite($file,$text);
                    fclose($file);
             }else{
                $file = fopen("test.txt","w");
                $text = "Moj prvi log".PHP_EOL;
                fwrite($file,$text);
                fclose($file);
             }


    }

    public function cookies(){
        setcookie('cookies_accepted', 'yes', time() + (86400 * 1), "/");
    }

    public  function getCookies(){
        if(isset($_COOKIE['cookies_accepted'])){
            dd('prihvaceno');
        }else{
            dd('nije prihvaćeno');
        }
    }

    public function query(){
        dd(\DB::select('select * from news'));
    }
}
