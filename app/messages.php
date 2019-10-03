<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Kyslik\ColumnSortable\Sortable;

class messages extends Model
{
    use Sortable;
    public $sortable = [ 'user_name' , 'email' , 'created_at' ];

    public static function creating ( $req )
    {
        session_start ();
        if ( $req -> input ( "captcha_code" ) == $_SESSION[ "captcha_code" ] ) {
            $userName = $req -> input ( 'userName' );
            $email = $req -> input ( 'email' );
            $homepage = $req -> input ( 'homepage' );
            $message = $req -> input ( 'message' );
            $user_ip = $req -> input ( 'ip' );
            $user_browser = $req -> input ( 'browser' );

            $data = array ( "user_name" => $userName ,
                "email" => strip_tags ( $email ) ,
                "homepage" => strip_tags ( $homepage ) ,
                "message" => strip_tags ( $message ) ,
                'user_ip_address' => strip_tags ( $user_ip ) ,
                'user_browser' => strip_tags ( $user_browser ) ,
                'created_at' => \Carbon\Carbon ::now () ,
                'updated_at' => \Carbon\Carbon ::now () , );
            DB ::table ( 'messages' ) -> insert ( $data );
        }
    }
}
