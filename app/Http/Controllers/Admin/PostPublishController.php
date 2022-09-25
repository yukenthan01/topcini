<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Authorizable;

class PostPublishController extends Controller
{
    use Authorizable;

    public function postpublish()
    {
        // $jobs = DB::table('jobs')->count();
        //     // return $jobs;
        // if($jobs == 0 && file_get_contents(__DIR__ . '/../../../../public/queuerun.txt') == 1)
        // {
        //     Artisan::call('queue:restart');
        //     file_put_contents(__DIR__ . '/../../../../public/queuerun.txt', 1);
        //     \Log::info('0');
        // }
        // else if($jobs > 0 && file_get_contents(__DIR__ . '/../../../../public/queuerun.txt') == 0 )
        // {
        //     Artisan::call('queue:work',['--stop-when-empty' => true]);
        //     Artisan::call('queue:work');
        //     file_put_contents(__DIR__ . '/../../../../public/queuerun.txt', 1);
        //     \Log::info('1');


        // }
        Artisan::call('queue:work',['--stop-when-empty' => true,'--tries'=>3]);
        // \Log::info('1');
        return 'hi' ;
    }
}
