<?php
// Composer autoloading
require_once dirname(__FILE__) . '/vendor/autoload.php';

header('Content-type: text/html; charset=utf-8');

define('DOCUMENT_ROOT', str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']));
define('FOLDER_ROOT', '/apache-markdown-handler');
$allowedExtensions = ['md', 'markdown'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_ROOT ?>/bower_components/normalize-css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_ROOT ?>/css/utilities.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_ROOT ?>/css/typography.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_ROOT ?>/css/layout.css">
    <link rel="stylesheet" type="text/css" href="<?= FOLDER_ROOT ?>/css/small.css">
</head>
<body>
<div class="wrapper">
    <?php
    $file = str_replace('\\', '/', realpath($_SERVER['PATH_TRANSLATED']));
    if ($file && is_file($file) && in_array(strtolower(substr($file, strrpos($file, '.') + 1)), $allowedExtensions) && substr($file, 0, strlen(DOCUMENT_ROOT)) == DOCUMENT_ROOT) {
        $parser = new ParsedownExtra();
        print $parser->Parse(file_get_contents($file));
    } else {
        print '<p>Bad filename given</p>';
    }
    ?>
</div>
<script type="text/javascript" src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script type="text/javascript" src="<?= FOLDER_ROOT ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?= FOLDER_ROOT ?>/javascript/main.js"></script>
</body>
</html>