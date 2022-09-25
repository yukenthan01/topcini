<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Post,Category,Comment,Subscribe};


class TopciniController extends Controller
{
    public function index()
    {
        $topvideos = Post::latest()->limit(9)->get();
        $latestvideos = Post::latest()->limit(5)->get();
        // $vijay = Post::get();
        // $vijay2 = $vijay->category()->where('parent_id', 1)->get();
        $vijays = Post::latest()->whereHas('category', function ($query) {
            $query->where('parent_id',1);
        })->limit(9)->get();
        $zees = Post::latest()->whereHas('category', function ($query) {
            $query->where('parent_id',4);
        })->limit(9)->get();
        $suns = Post::latest()->whereHas('category', function ($query) {
            $query->where('parent_id',2);
        })->limit(9)->get();
        $jayas = Post::latest()->whereHas('category', function ($query) {
            $query->where('parent_id',8);
        })->get();
        $url = url()->current();
        $categories = Category::whereParentId(null)->orderBy('id','ASC')->get();
        // return $url;
        return view('front-end.pages.index',compact('topvideos','vijays','suns','zees','jayas','latestvideos','url','categories'));
    }
    public function categoryview($slug){
        $topvideos = Post::limit(5)->get();
        $cate = Category::whereSlug($slug)->pluck('id');
        $maincateggory = Category::whereSlug($slug)->first();
        // return $cate;
        if(!empty($cate[0]))
        {
            $maincateggory = Category::whereSlug($slug)->first()->name;
            $cate = $cate[0];
            $categoryes= Post::latest()->whereHas('category', function ($query) use ($cate) {
                $query->where('parent_id',$cate);
            })->paginate(30);
            $url = url()->current();
            return view('front-end.pages.category',compact('categoryes','maincateggory','topvideos','url'));
        }
        else{
            return view('front-end.pages.404');
            // return view('front-end.pages.category',compact('categoryes','maincateggory','topvideos','url'));
        }

    }
    public function singleserial($category,$serial,$postdrama){
        $singleview = Post::whereSlug($postdrama)->first();
        if(empty($singleview))
        {
            return view('front-end.pages.404');
        }
        $relateds = Post::whereCategoryId($singleview->category()->first()->id)->get();
        return view('front-end.pages.singleview',compact('singleview','relateds'));
    }
    public function savecomment(Request $request){
        
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->status = 'Pending';
        $comment->save();
        return response()->json([
            'success' => true,
            'message'=>'Thanks for your comment!!!!',
        ]);

    }
    public function singledrama($category,$drama){
        
        $category = Category::whereSlug($drama)->first()->id;
        $maincateggory = Category::whereSlug($drama)->first()->name;
        $topvideos = Post::limit(5)->get();
        $categoryes = Post::latest()->whereCategoryId($category)->paginate(12);
        return view('front-end.pages.category',compact('categoryes','maincateggory','topvideos'));
    }
    public function subscribe(Request $request){
        $checkmail = Subscribe::whereEmail($request->email)->first();
        if(!isset($checkmail)){
            $subscribe = new Subscribe();
            $subscribe->name = $request->name;
            $subscribe->email = $request->email;
            $subscribe->save();
            return response()->json([
                'success' => true,
                'message'=>'Thanks for your subscribing!!!!',
            ]);
        }
        else
        {
            return response()->json([
               
                'message'=>'Your Already Subscribed!!!!',
            ]);
        }
        
    }
    public function autocomplete(Request $request){
        $query = $request->get('query');
        $data = Post::where('title', 'LIKE', "%{$query}%")
                ->limit(5)
                ->get();
        $output = '<ul  class="dropdown-menu" style="display:block; position:relative;left: 75%;background-color: #333;">';
        foreach($data as $row)
        {
            $output .= '
                <li id="itemlistout" style="z-index: 1000; position:relative;"><a href="#" data-title="'.$row->slug.'" id="item_name" style="color: #b0bec5;">'.$row->title.'</a></li>
            ';
        } 
        $output .= '</ul>';
        return $output;
        
    }
    public function searchresults(){
        $sea = str_slug(request()->search);

        $cate = Category::whereSlug('slug', 'LIKE', "%{$sea}%")->pluck('id');

         $categoryes= Post::latest()->whereHas('category', function ($query) use ($cate) {
            $query->whereIn('parent_id',$cate);
        })->paginate(10);
// return $sea;
        $searchresults = Post::where('slug', 'LIKE', "%{$sea}%")->paginate(30);
        return view('front-end.pages.searcview',compact('searchresults'));
    }
    public function fbcount(){
        $pageUid = "346439459184979";
        $appid = "539339423139739";
        $appsecret = "c8fc2bf653f6ea45cec9e5eb30897ac8";
        $result = json_decode(file_get_contents('https://graph.facebook.com/'.$pageUid.'?access_token='.$appid.'|'.$appsecret));
        if($result->likes) {
            return $result->likes;
        } else {
            return 0;
        }
    }
    public function backendsearch(Request $request)
    {
        $sea = request()->search;
        $posts = Post::where('title', 'LIKE', "%{$sea}%")->get();
        return view('back-end.post.index',compact('posts'));
    }

}
