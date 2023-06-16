<?php
function getRegistran($link)
{
    // $auth = '&user='.urlencode($_SESSION['user']).'&pass='.urlencode($_SESSION['pass']);
    // $links = "localhost/app/api.php?function=" . $link;
    $links = "localhost/HRIS/controller/api.php?function=" . $link;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    echo $links;
    return $output;
}

function getAdmin($link)
{
    $auth = '&user=' . urlencode($_SESSION['user']) . '&pass=' . urlencode($_SESSION['pass']);
    $links = "https://mytax.web.id/api/rest_admin.php?function=" . $link . $auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    //echo $links;
    return $output;
}

function getApp($link)
{
    $auth = '&user=' . urlencode($_SESSION['user']) . '&pass=' . urlencode($_SESSION['pass']);
    $links = "https://mytax.web.id/api/rest_app.php?function=" . $link . $auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    //echo $links;
    return $output;
}

function getMaster($link)
{
    $auth = '&user=' . urlencode($_SESSION['user']) . '&pass=' . urlencode($_SESSION['pass']);
    $links = "https://mytax.web.id/api/rest_master.php?function=" . $link . $auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    //echo $links;
    return $output;
}

function getData($link)
{
    $auth = '&user=' . urlencode($_SESSION['user']) . '&pass=' . urlencode($_SESSION['pass']);
    $links = "https://mytax.web.id/api/rest_data.php?function=" . $link . $auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    //echo $links;
    return $output;
}

function getReport($link)
{
    $auth = '&user=' . urlencode($_SESSION['user']) . '&pass=' . urlencode($_SESSION['pass']);
    $links = "https://mytax.web.id/api/rest_report.php?function=" . $link . $auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    //echo $links;
    return $output;
}

function getChat($link)
{
    $auth = '&user=' . urlencode($_SESSION['user']) . '&pass=' . urlencode($_SESSION['pass']);
    $links = "https://mytax.web.id/api/rest_chat.php?function=" . $link . $auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $links);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    //echo $links;
    return $output;
}
