<?php

function redirect($file){
    echo"use methos";
    header("Location: ". URLROOT .$file);
    exit;
}



