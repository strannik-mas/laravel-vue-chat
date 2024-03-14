<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $url_data = [
            [
                'title' => 'popmech',
                'url' => 'https://popmech.ru'
            ],
            [
                'title' => 'youtube',
                'url' => 'https://youtube.com'
            ]
        ];
        return view('start', [
            'url_data' => $url_data
        ]);
    }

    public function getJson()
    {
        return [
            [
                'title' => 'popmech',
                'url' => 'https://popmech.ru'
            ],
            [
                'title' => 'youtube',
                'url' => 'https://youtube.com'
            ]
        ];
    }

    public function sendMessage(Request $request)
    {
        event(new NewMessage($request->input('message')));
        //NewMessage::dispatch($request->input('message'));
    }
}