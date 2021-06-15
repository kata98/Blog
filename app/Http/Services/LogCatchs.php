<?php


namespace App\Http\Services;


class LogCatchs
{

    public static function writeLog ($ex, $msg) {
        \Log::channel('single')->error( $msg . ", With bug: ". $ex);
    }
    public static function writeLogSuccess ($msg) {
        \Log::channel('single')->notice( $msg );
    }

}
