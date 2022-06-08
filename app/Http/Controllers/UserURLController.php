<?php

namespace App\Http\Controllers;

use App\Models\UserURL;
use Illuminate\Http\Request;
use App\Http\Requests\UserURLRequest;
use Illuminate\Support\Carbon;

class UserURLController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserURLRequest $request)
    {
        $userUrl = new UserURL;
        $userUrl->fill($request->validated());
        $userUrl->shortend_hash = substr(strtoupper(bin2hex(random_bytes(3))), 0, 5);
        $userUrl->save();

        return view('user-urls/show')->with('userUrl', $userUrl);
    }

    public function show(UserURL $userUrl)
    {
        $userUrl->hits_count = $userUrl->hits_count + 1;
        $userUrl->last_visited_at = Carbon::now();
        $userUrl->save();

        return redirect()->away($userUrl->url);
    }
}
