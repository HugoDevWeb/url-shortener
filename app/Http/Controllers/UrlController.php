<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{


    public function create()
    {
        return view('welcome');
    }


    public function store(Request $request)
    {
        $this->validate($request, ['url' => 'required | url']);
        $record = $this->getRecordForUrl($request->url);
        return view('result')->with('shortened', $record->shortened);
    }


    public function show($shortened)
    {
        $url = Url::whereShortened($shortened)->firstOrFail();
        return redirect($url->url);
    }


    private function getRecordForUrl($url)
    {
        return Url::firstOrCreate(
            ['url' => $url],
            ['shortened' => Url::getUniqueShortUrl()]
        );

//        $record = Url::whereUrl($url)->first();
//
//        if ($record) {
//            return $record;
//        }
//
//        return Url::create([
//            'url' => request('url'),
//            'shortened' => self::getUniqueShortUrl(),
//        ]);

    }
}
