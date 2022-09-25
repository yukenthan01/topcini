<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Post;
use Toolkito\Larasap\SendTo;
use App\Models\Category;

class SendPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $title;
    protected $category;
    protected $slug;
    protected $token;
    protected $parent;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public function __construct($token,$post)
    {
         $this->token = $token;
         $this->category = $post->category->slug;
         $this->parent = $post->category->parent->slug;
         $this->slug = $post->slug;
         $this->title = $post->title;
        //  $this->image = $post->category->image;
        //  $this->category = Category::find($category);
        //  $this->slug = $slug;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = url('/').'/'. $this->parent.'/'. $this->category.'/'. $this->slug;
        \Log::info($this->slug);

        SendTo::Facebook(
            'link',
            [
                'link' =>$url,
                'message' => $this->title.' Added at Topcini',
                'page_access_token' => $this->token,
               
            ]
        ); 

        // SendTo::Facebook(
        //     'link',
        //     [
        //         'link' => url('').'/'.$this->category->parent->slug.'/'.$this->category->slug.'/'.$this->slug,
        //         'message' => $this->title .' Added at Topcini',
        //         'page_access_token' => 'EAAXe52J9wC0BABPugoYj5iqRccaaQ2FM5rhy01pamuo1cdF7uU5hCjOwWFvpgxXZCUZCLrNAeGFQAlZAVB1kFljBT6OldMaApu3WHNuQBPgiZCooLoGNZBgEn9g9M8EFVLywCIzZAx5kyoofgwynL9yhxqhOfNjZA3Xxsae1zpZBn2porSJ7WaCtYfJkEopGxNEZD'
        //     ]
        // );
        // $access_token = ['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'];

        // for ($i=0; $i <count( $access_token ) ; $i++) { 
        //     SendTo::Facebook(
        //         'link',
        //         [
        //             'link' => 'http://topcini.com',
        //             'message' => $this->title . ' Added at Topcini',
        //             'page_access_token' => $access_token[$i] 
        //         ]
        //     );
        // }
           
       
    }
}
