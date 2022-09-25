<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Category,Post};

use Illuminate\Support\Facades\Validator;
use File;
use Toolkito\Larasap\SendTo;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Authorizable;
use Ixudra\Curl\Facades\Curl;

class PostController extends Controller
{
    use Authorizable;

    // use Queueable , SerializesModels;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function youtube()
    {
        $categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();
        return view('back-end.youtube.create',compact('categories'));

        // return view('welcome');
    } 
        
    public function postyoutube(Request $request)
    {
        $link = $request->url;
        $link_array = explode('/',$link);
        $link_arrays = explode('=',end($link_array));
    
        $id = end($link_arrays);
        $response = Curl::to('https://www.googleapis.com/youtube/v3/videos?id='.$id.'&key=AIzaSyCBIy5AJp3prH2bD3e4M9PxJBoDnZn71dQ&part=snippet,contentDetails,statistics,status')
        ->get();
        $res = json_decode($response,true);
        $title = $res['items'][0]['snippet']['title'];
        $videourl = 'https://www.youtube.com/embed/'.$id;
        $categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();
        // echo '<pre>';
        // print_r($res['items'][0]['snippet']['title']);
        // echo '</pre>';
        // return $res['items'][0]['snippet']['title']; 
        return view('back-end.youtube.create',compact('categories','title','videourl'));

        // return view('welcome');
    }  
    public function sendcurl()
    {
        $categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();
        return view('back-end.urlpost.create',compact('categories'));

        // return view('welcome');
    }
    public function getcurlpost(Request $request)
    {

        $categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();
        $response = Curl::to($request->url)
        ->get();
        // return redirect()->route('post.create');
        return view('back-end.urlpost.create',compact('response','categories'));
        // return redirect()->back()->with($response);
    }
    public function index()
    {

        $posts = Post::all();
        return view('back-end.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();
        return view('back-end.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return url('/');
        // $image = Category::find($request->category_id);
        // $image->image;
        $validation = validator::make($request->all(),[
            'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',


        ]);

        if($validation->passes())
        {
            $slug = isset($request->slug)?$request->slug:str_slug($request->title);
            $post = new Post();
            $post->title = $request->title;
            $post->title_text = $request->title_text;
            // $post->slug = md5($slug);
            $post->slug = str_slug($request->title);
            $post->date = date('Y-m-d', strtotime($request->date));


            $post->content = $request->content;
            $post->content2 = $request->content2;
            $post->content3 = $request->content3;
            $post->category_id = $request->category_id;
            $post->share = $request->share;

            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->move(public_path('post_image'),$name);
                $post->image = $name;
            }
            $post->save();
            // return $post->category;
            // $post->slug = $slug;
            // return $post;
            // $post->categories()->sync($request->child);

        //    Queue::push(
        //        SendTo::Facebook(
        //         'link',
        //         [
        //             'link' => 'https://github.com/toolkito/laravel-social-auto-posting',
        //             'message' => 'Laravel social auto posting',
        //             'page_access_token' => 'EAAXe52J9wC0BAJ5fXwhZCweMrZC2uNuy7t3pfTx1lDayxeUxcNEB6Cye4rPU13hSXcKv3xPLiPTiHfuwSA4xhZCpVJRImzRCZA81n7imZCuuiZA55aCI9UJXOYIRh2NZCxeheSD3U5xO4ntoyigNHKYKVoi4Erx4dzOsPRloG0QUhQyqD3sPAzckdYvjzfZChPEZD'
        //         ]

        //         )
        //     );

            // $host = 'https://'.request()->getHost();
            // SendPost::dispatch($request->title,$request->category_id,$slug);
            // SendPost::dispatch();
            // $request->slug
            if($post->share == "1"){

                for ($i=0; $i <count(pageTokens()) ; $i++) {
                    SendPost::dispatch(pageTokens()[$i],$post);
                }
                    // 4 zee 19 bharathi 31 sathya 114 hitler 8 colors
                if($post->category_id == 19 )
                {
                    SendPost::dispatch(pageTokensBharathi()[0],$post);
                }
                if($post->category_id == 31 )
                {
                    SendPost::dispatch(pageTokensSathya()[0],$post);
                }
                if($post->category_id == 114 )
                {
                    SendPost::dispatch(pageTokensHitler()[0],$post);
                }
                $parent_category = Category::whereId($post->category_id)->first();

                if($parent_category->parent_id == 4 )
                {
                    SendPost::dispatch(pageTokensZee()[0],$post);
                }
                if($parent_category->parent_id == 8 )
                {
                    SendPost::dispatch(pageTokensColors()[0],$post);
                }

                SendTo::Twitter(
                    $post->title.' Post Added at Topcini' .' '.url('/').'/'. $post->category->parent->slug.'/'. $post->category->slug.'/'. $post->slug ,
                    [
                        public_path('category_image/'.$post->category->image),

                    ]
                );
            }


            if(isset($request->getposturl))
            {
                return redirect()->route('urlpost');
            } 
            elseif(isset($request->getyoutube))
            {
                return redirect()->route('youtube');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back()->withErrors($validation)
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::whereParentId(null)->whereStatus('active')->with('children')->get();

        return view('back-end.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $validation = validator::make($request->all(),[
            'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        if($validation->passes())
        {
            $slug = isset($request->slug)?$request->slug:str_slug($request->title);
            $post = Post::find($id);
            $post->title = $request->title;
            $post->title_text = $request->title_text;
            $post->date = date('Y-m-d', strtotime($request->date));

            // $post->slug = md5($slug);
            $post->slug = str_slug($request->title);
            $post->content = $request->content;
            $post->content2 = $request->content2;
            $post->content3 = $request->content3;
            $post->category_id = $request->category_id;
            $post->share = $request->share;

            if($request->hasfile('image'))
            {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $image->move(public_path('post_image'),$name);
                $post->image = $name;
            }
            $post->save();
            // $post->categories()->sync($request->category);

            return redirect()->back();
        }
        else
        {
            return redirect()->back()->withErrors($validation)
            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $image_path = "post_image/".$post->image;

        if(File::exists($image_path)) {
            File::delete($image_path);

        }
        $post->delete();


        return response()->json([
            'success'=>true,
            'message'=>'Deleted Successful',
        ]);
    }

    public function child(Request $request)
    {
        $child_categories = Category::whereParentId($request->id)->whereStatus('active')->pluck('name','id');
        return  response()->json([
            'child' => $child_categories

        ]);
    }
}
