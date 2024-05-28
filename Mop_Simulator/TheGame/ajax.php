<?php

    require_once "../includes/auth.inc.php";

    $a = new MyAccount();

    $currScore = $_POST["cScore"];
    $userId    = $_POST["uId"];

    $res = array(
        "msg" => "Hmmmm.",
        "id"  => 2
    );

    $cUserMaxScore = $a->getCurrUserMaxScore($userId);

    if ($currScore > $cUserMaxScore) {
        $res = array(
            "msg" => "Highest Score Updated!",
            "id"  => 1
        );

        $a->updateMaxScore($currScore, $userId);

    }else{
        $res = array(
            "msg" => "Maybe next time...",
            "id"  => 0
        );
    }

    echo json_encode($res, true);

?>
