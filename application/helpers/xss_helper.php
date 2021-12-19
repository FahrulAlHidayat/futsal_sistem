<?php

function xecho($str){
    echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
