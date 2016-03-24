<?php

if (!function_exists('get_timeago')) {

    function get_timeago($ptime) {
        $timeIgI3dan = time() - $ptime;
        if ($timeIgI3dan < 1) {
            return "Il ya moins d'une seconde";
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'année',
            30 * 24 * 60 * 60 => 'mois',
            24 * 60 * 60 => 'jour',
            60 * 60 => 'heure',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($condition as $secs => $str) {
            $d = $timeIgI3dan / $secs;
            if ($d >= 1) {
                $r = round($d);
                return 'il ya ' . $r . ' ' . $str . ( ($r > 1 && $str != 'mois' && $str != 'année') ? 's' : '' ) . ' ';
            }
        }
    }

}