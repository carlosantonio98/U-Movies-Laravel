<?php 

if (! function_exists('currentMonth')) {
    function currentMonth()
    {
        setlocale(LC_ALL, 'spanish');

        $dateObj = DateTime::createFromFormat('!m', date('m'));

        $monthName = strftime('%B', $dateObj->gettimestamp());

        return $monthName;
    }
}