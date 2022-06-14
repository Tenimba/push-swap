<?php
ob_start();
include_once('push.php');
$la = [];
$lb = [];
$calls = [];
foreach ($argv as $key => $value) {
    if ($key !== 0 && is_numeric($value)){ 

        $la[] = $value;
    } 
}


function sortie() {
    global $la;
    $a = $la;
    sort($a);
    return $a == $la;
}

if (count($la) > 1) {
    $count = count($la);
    if (!sortie()) {
        push();
    }
}
function lb() {
    global $la, $lb;
    foreach ($lb as $key => $value) {
        if (isset($lb[1]) && $lb[0] < $lb[1]) {
            sb();
        }
        pa();
        if (isset($la[1]) && $la[0] > $la[1]) {
            sa();
        }
        if (isset($lb[1]) && $lb[0] < $lb[count($lb) -1]) {
            rb();
        }
       
    }
}

function la() {
    global $la, $lb;
    foreach ($la as $key => $value) {
        if(isset($la[1])  && $la[0]<$la[1]){
            pb();
        } else {
            sa();
            if(sortie()){
                break;   
            }
            pb();
            if (isset($la[1]) && $la[0] > $la[count($la) -1]){
                ra();
        }
        if (isset($lb[1]) && $lb[0] < $lb[1]) {
            sb();
        }  
        if (isset($lb[1]) && $lb[0] < $lb[count($lb) -1]){
            rb();
        }
    }
    }
}

function autre() {
    global $la, $lb,$count;
    for ($j = 0; $j < $count; $j++) {
        if (isset($la[1])) {
            $key = array_search(min($la), $la);
            for ($i = 0; $i < $key ; $i++) {
                ra();
            }
            pb();
        }
    }
    foreach ($lb as $key => $value) {
        pa();
    }
}

function push() {
    global $la, $lb;
    if (!sortie()) {
        la();
        lb();
        if (!sortie()) {
            push();
        }
    } else {
 autre();
    
    }
}
ob_end_flush();
echo implode(" ",$calls)."\n";
