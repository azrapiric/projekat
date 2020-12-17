<?php

function vratiString($name){
    return 'Funkcija iz helpersa '. $name;
}

function getLang()
{
    return app()->getLocale();
}
?>
