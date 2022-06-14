<?php

function sa() {
    global $la, $calls;
    if (isset($la[1])) {
        $tmp = $la[0];
        $la[0] = $la[1];
        $la[1] = $tmp;
        array_push($calls, "sa");
    }
}

function sb() {
    global $lb, $calls;
    if (isset($lb[1])) {
        $tmp = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $tmp;
        array_push($calls, "sb");
    }
}

function sc() {
    sa();
    sb();
}

function pa() {
    global $la, $lb, $calls;
    array_unshift($la, array_shift($lb));
 array_push($calls, "pa");
}

function pb() {
    global $la, $lb, $calls;
    array_unshift($lb, array_shift($la));
   array_push($calls, "pb");
}

function ra() {
    global $la, $calls;
    array_push($la, array_shift($la));
  array_push($calls, "ra");
}

function rb() {
    global $lb, $calls;
    array_push($lb, array_shift($lb));
 array_push($calls, "rb");
}

function rr() {
    ra();
    rb();
}

function rra() {
    global $la, $calls;
    array_unshift($la, array_pop($la));
array_push($calls, "rra");

}

function rrb() {
    global $lb, $calls;
    array_unshift($lb, array_pop($lb));
array_push($calls, "rrb");

}

function rrr() {
    rra();
    rrb();
}
?>
