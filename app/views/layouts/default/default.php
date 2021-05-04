<html lang="en">
<head>
    <meta charset="<?=$charset?>">
    <meta name="viewport" content="width=<?=$viewportType?>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=URL['fonts']?>"/>
    <link rel="stylesheet" href="<?=URL['bootstrap_css_cdn']?>" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URL['css_styles'] . "style.css"?>">
    <link rel="stylesheet" href="<?=URL['css_styles'] . "blog.css"?>">
    <title><?=$title?></title>
</head>
<body>
<?=$header?>
<div class="page-wrapper">
<?=$content?>
<?=$sidebar?>
</div>
</div>
<?=$footer?>
<script src="<?=URL['jquery_cdn']?>"></script>
<script type="text/javascript" src="<?=URL['slick_cdn']?>"></script>
<script src="<?=URL['local_native_js_scripts'] . "scripts.js"?>"></script>
</body>
</html>