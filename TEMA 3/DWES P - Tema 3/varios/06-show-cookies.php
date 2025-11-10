<?php

if (isset($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        echo $key . ' ' . $value . "<br>";
    }
}