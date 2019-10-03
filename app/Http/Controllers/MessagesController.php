<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\messages;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $messagesList = messages ::sortable () -> orderBy ( 'id' , 'desc' ) -> paginate ( 25 );
        return view ( 'welcome' , compact ( 'messagesList' ) );
    }

    /**
     * Display a listing of the resource in json.
     *
     * @return \Illuminate\Http\Response
     */
    public function json ()
    {
        $messagesList = json_encode ( messages ::all () );
        return view ( 'json' , compact ( 'messagesList' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ( Request $req )
    {
        App\messages ::creating ( $req );
        return redirect ( '/' );
    }

}
