
<?php
$dbhost = 'localhost';
$dbusr = 'root';
$dbpassword = '1234';
$dbname = 'yii_project';
$connection = mysqli_connect($dbhost,$dbusr,$dbpassword,$dbname);


if(mysqli_connect_errno()){
    die("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno.")");
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="aEg2ZUtTLTURCgMXGjRVey4LBS8bIVlWUAwDCQlrH1gSGmlUPwRkbA==">
    <title>Product Categories</title>
    <link href="/basic/web/assets/6b77df6a/css/bootstrap.css" rel="stylesheet">
<link href="/basic/web/css/site.css" rel="stylesheet"></head>
<body>

<div class="wrap">
    <nav id="w1" class="navbar-inverse navbar-fixed-top navbar" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w1-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button><a class="navbar-brand" href="/basic/web/index.php">My Company</a></div><div id="w1-collapse" class="collapse navbar-collapse"><ul id="w2" class="navbar-nav navbar-right nav"><li><a href="/basic/web/index.php?r=site%2Findex">Home</a></li>
<li><a href="/basic/web/index.php?r=site%2Fabout">About</a></li>
<li><a href="/basic/web/index.php?r=site%2Fcontact">Contact</a></li>
<li><a href="/basic/web/index.php?r=site%2Flogin">Login</a></li></ul></div></div></nav>
    <div class="container">
        <ul class="breadcrumb"><li><a href="/basic/web/index.php">Home</a></li>
<li class="active">Product Categories</li>
</ul>        <div class="product-category-index">

    <h1>Product Categories</h1>
    
    <p>
        <a class="btn btn-success" href="/basic/web/index.php?r=product-category%2Fcreate">Create Product Category</a>    </p>
    <div id="w0" class="grid-view"><div class="summary">Showing <b>1-20</b> of <b>20</b> items.</div>
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th><th><a href="/basic/web/index.php?r=product-category%2Findex&amp;sort=product_category_id" data-sort="product_category_id">Product Category ID</a></th><th><a href="/basic/web/index.php?r=product-category%2Findex&amp;sort=product_category_name" data-sort="product_category_name">Product Category Name</a></th><th class="action-column">&nbsp;</th></tr><tr id="w0-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="SearchProductCategory[product_category_id]"></td><td><input type="text" class="form-control" name="SearchProductCategory[product_category_name]"></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<?php


$i = 1;

if(!isset($_GET["product_category_id"])){
$query = "SELECT * FROM product_category ";
$result = mysqli_query($connection,$query);
if(!$result){
   die("Database query failed.");
}

while($subject = mysqli_fetch_assoc($result)){
    $product_category_id = $subject["product_category_id"];

    $query_test = "SELECT * FROM product_category_key where pro_product_category_id = ".$product_category_id;
    $result_test = mysqli_query($connection,$query_test);
    $number = 0;
    while($subject_test = mysqli_fetch_assoc($result_test)){
        if($subject_test['product_category_id'] != $product_category_id){
            $number+=1;
        }
    }
    mysqli_free_result($result_test);

if($number == 0){
$address = "/basic/views/vic/product_detail.php?product_category_id=".$product_category_id;
}else{
$address = "/basic/views/vic/prodct_category.php?product_category_id=".$product_category_id;    
}

$input = "<tr data-key='0'><td>$i</td><td>{$subject['product_category_id']}   <a class='btn btn-success' href = '$address'>详细</a> </td><td>{$subject['product_category_name']}</td><td><a href='/basic/web/index.php?r=product-category%2Fview&amp;id=0' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a> <a href='/basic/web/index.php?r=product-category%2Fupdate&amp;id=0' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a> <a href='/basic/web/index.php?r=product-category%2Fdelete&amp;id=0' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?'' data-method='post'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

echo strip_tags($input,'<tr><td><a><span>');
$i++;
}
 mysqli_free_result($result); 

}else{
    $product_category_id = $_GET["product_category_id"];
    $query1 = "SELECT * FROM product_category_key where pro_product_category_id = ". $product_category_id;
    $result_test1 = mysqli_query($connection,$query1);
    if(!$result_test1){
        echo mysqli_error($connection);
        die("Database query failed here0.");
    }
    while ($subject = mysqli_fetch_assoc($result_test1)) {
       
        $son_id = $subject["product_category_id"];
         
        $query_vic = "SELECT * FROM product where product_category_id = ".$son_id;

        $result_son = mysqli_query($connection,$query_vic);
        if(!$result_son){
        die("Database query failed here1.");
    }  
        if($subject_son = mysqli_fetch_assoc($result_son)){
           
            $product_category_ic_checkson = $subject_son["product_category_id"];
            $query_testson = "SELECT * FROM product_category_key where pro_product_category_id = ". $product_category_ic_checkson;

    $result_testson = mysqli_query($connection,$query_testson);
    if(!$result_testson){
        die("Database query failed here2.");
    }
    $number = 0;
    while($subject_test_son = mysqli_fetch_assoc($result_testson)){
        if($subject_test_son["product_category_id"] != $product_category_ic_checkson){
            $number+=1;
        }
    }
    mysqli_free_result($result_testson);
    if($number == 0){
$address = "/basic/views/vic/product_detail.php?product_category_id=".$product_category_ic_checkson;
}else{
$address = "/basic/views/vic/prodct_category.php?product_category_id=".$product_category_ic_checkson;    
}

$input = "<tr data-key='0'><td>$i</td><td>{$subject_son['product_category_id']}  <a class='btn btn-success' href = '$address'>详细</a> </td><td>{$subject_son['product_name']}</td><td><a href='/basic/web/index.php?r=product-category%2Fview&amp;id=0' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a> <a href='/basic/web/index.php?r=product-category%2Fupdate&amp;id=0' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a> <a href='/basic/web/index.php?r=product-category%2Fdelete&amp;id=0' title='Delete' aria-label='Delete' data-pjax='0' data-confirm='Are you sure you want to delete this item?'' data-method='post'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

echo strip_tags($input,'<tr><td><a><span>');
$i++;

        }
        mysqli_free_result($result_son); 
       
    }

mysqli_free_result($result_test1);
}

?>
</tbody></table>
</div></div>
    </div>
</div>

<?php mysqli_close($connection);?>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company 2017</p>

        <p class="pull-right">Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a></p>
    </div>
</footer>

<div id="yii-debug-toolbar" data-url="/basic/web/index.php?r=debug%2Fdefault%2Ftoolbar&amp;tag=5913439ad180c" style="display:none" class="yii-debug-toolbar-bottom"></div><style>
#yii-debug-toolbar-logo {
    position: fixed;
    right: 31px;
    bottom: 4px;
}

.yii-debug-toolbar {
    font: 11px Verdana, Arial, sans-serif;
    text-align: left;
    width: 96px;
    transition: width .3s ease;
    z-index: 1000000;
}

.yii-debug-toolbar_active {
    width: 100%;
}

.yii-debug-toolbar_position_top {
    margin: 0 0 20px 0;
    width: 100%;
}

.yii-debug-toolbar_position_bottom {
    position: fixed;
    right: 0;
    bottom: 0;
    margin: 0;
}

.yii-debug-toolbar__bar {
    position: relative;
    padding: 0;
    font: 11px Verdana, Arial, sans-serif;
    text-align: left;
    overflow: hidden;
    box-sizing: content-box;

    background: rgb(255, 255, 255);
    background: -moz-linear-gradient(top, rgb(255, 255, 255) 0%, rgb(247, 247, 247) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(255, 255, 255) 0%, rgb(247, 247, 247) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(255, 255, 255) 0%, rgb(247, 247, 247) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f7f7f7', GradientType=0); /* IE6-9 */

    border: 1px solid rgba(0, 0, 0, 0.11);

    /* ensure debug toolbar text is displayed ltr even on rtl pages */
    direction: ltr;
}

.yii-debug-toolbar.yii-debug-toolbar_active:not(.yii-debug-toolbar_animating) .yii-debug-toolbar__bar {
    overflow: visible;
}
.yii-debug-toolbar:not(.yii-debug-toolbar_active) .yii-debug-toolbar__bar {
    height:40px;
}

.yii-debug-toolbar__bar:after {
    content: '';
    display: table;
    clear: both;
}

.yii-debug-toolbar__view {
    height: 0;
    overflow: hidden;
    background: white;
}

.yii-debug-toolbar__view iframe {
    margin: 0;
    padding: 0;
    padding-top: 10px;
    height: 100%;
    width: 100%;
    border: 0;
}

.yii-debug-toolbar_iframe_active .yii-debug-toolbar__view {
    height: 100%;
}

.yii-debug-toolbar_iframe_animating .yii-debug-toolbar__view {
    transition: height .3s ease;
}

.yii-debug-toolbar__block {
    float: left;
    margin: 0;
    border-right: 1px solid rgba(0, 0, 0, 0.11);
    padding: 4px 8px;
    line-height: 32px;
    white-space: nowrap;
}

.yii-debug-toolbar__block_active,
.yii-debug-toolbar__ajax:hover {
    background: rgb(247, 247, 247); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7', endColorstr='#e0e0e0', GradientType=0); /* IE6-9 */
}

.yii-debug-toolbar__block a {
    display: inline-block;
    text-decoration: none;
    color: black;
}

.yii-debug-toolbar__block img {
    vertical-align: middle;
}

.yii-debug-toolbar__label {
    display: inline-block;
    padding: 2px 4px;
    font-size: 12px;
    font-weight: normal;
    line-height: 14px;
    white-space: nowrap;
    vertical-align: baseline;
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    background-color: #999999;
    -webkit-border-radius: 3px;
       -moz-border-radius: 3px;
            border-radius: 3px;
}

.yii-debug-toolbar__label:empty {
    display: none;
}

a.yii-debug-toolbar__label:hover,
a.yii-debug-toolbar__label:focus {
    color: #ffffff;
    text-decoration: none;
    cursor: pointer;
}

.yii-debug-toolbar__label_important,
.yii-debug-toolbar__label_error {
    background-color: #b94a48;
}

.yii-debug-toolbar__label_important[href] {
    background-color: #953b39;
}

.yii-debug-toolbar__label_warning,
.yii-debug-toolbar__badge_warning {
    background-color: #f89406;
}

.yii-debug-toolbar__label_warning[href] {
    background-color: #c67605;
}

.yii-debug-toolbar__label_success {
    background-color: #468847;
}

.yii-debug-toolbar__label_success[href] {
    background-color: #356635;
}

.yii-debug-toolbar__label_info {
    background-color: #3a87ad;
}

.yii-debug-toolbar__label_info[href] {
    background-color: #2d6987;
}

.yii-debug-toolbar__label_inverse,
.yii-debug-toolbar__badge_inverse {
    background-color: #333333;
}

.yii-debug-toolbar__label_inverse[href],
.yii-debug-toolbar__badge_inverse[href] {
    background-color: #1a1a1a;
}

.yii-debug-toolbar__title {
    background: rgb(247, 247, 247); /* Old browsers */
    background: -moz-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgb(247, 247, 247) 0%, rgb(224, 224, 224) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7', endColorstr='#e0e0e0', GradientType=0); /* IE6-9 */
}

.yii-debug-toolbar__block_last{ /* creates space for .yii-debug-toolbar__toggle, .yii-debug-toolbar__external */
    width: 80px;
    height: 40px;
    float: left;
}

.yii-debug-toolbar__toggle,
.yii-debug-toolbar__external {
    cursor: pointer;
    position: absolute;

    width: 30px;
    height: 30px;
    font-size: 25px;
    font-weight: 100;
    line-height: 28px;
    color: #ffffff;
    text-align: center;

    opacity: 0.5;
    filter: alpha(opacity=50);

    transition: opacity .3s ease;
}

.yii-debug-toolbar__toggle:hover,
.yii-debug-toolbar__toggle:focus,
.yii-debug-toolbar__external:hover,
.yii-debug-toolbar__external:focus {
    color: #ffffff;
    text-decoration: none;
    opacity: 0.9;
    filter: alpha(opacity=90);
}

.yii-debug-toolbar__toggle-icon,
.yii-debug-toolbar__external-icon {
    display: inline-block;

    background-position: 50% 50%;
    background-repeat: no-repeat;
}

.yii-debug-toolbar__toggle {
    right: 10px;
    bottom: 4px;
}

.yii-debug-toolbar__toggle-icon {
    padding: 7px 0;
    width: 10px;
    height: 16px;
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDUwIDUwIj48cGF0aCBmaWxsPSIjNDQ0IiBkPSJNMTUuNTYzIDQwLjgzNmEuOTk3Ljk5NyAwIDAgMCAxLjQxNCAwbDE1LTE1YTEgMSAwIDAgMCAwLTEuNDE0bC0xNS0xNWExIDEgMCAwIDAtMS40MTQgMS40MTRMMjkuODU2IDI1LjEzIDE1LjU2MyAzOS40MmExIDEgMCAwIDAgMCAxLjQxNHoiLz48L3N2Zz4=');
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}

.yii-debug-toolbar_active .yii-debug-toolbar__toggle-icon {
    -webkit-transform: rotate(0);
    transform: rotate(0);
}

.yii-debug-toolbar_iframe_active .yii-debug-toolbar__toggle-icon {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.yii-debug-toolbar__external {
    display: none;
    right: 50px;
    bottom: 4px;
}

.yii-debug-toolbar_iframe_active .yii-debug-toolbar__external {
    display: block;
}

.yii-debug-toolbar__external-icon {
    padding: 8px 0;
    width: 14px;
    height: 14px;
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDUwIDUwIj48cGF0aCBmaWxsPSIjNDQ0IiBkPSJNMzkuNjQyIDkuNzIyYTEuMDEgMS4wMSAwIDAgMC0uMzgyLS4wNzdIMjguMTAzYTEgMSAwIDAgMCAwIDJoOC43NDNMMjEuNyAyNi43OWExIDEgMCAwIDAgMS40MTQgMS40MTVMMzguMjYgMTMuMDZ2OC43NDNhMSAxIDAgMCAwIDIgMFYxMC42NDZhMS4wMDUgMS4wMDUgMCAwIDAtLjYxOC0uOTI0eiIvPjxwYXRoIGQ9Ik0zOS4yNiAyNy45ODVhMSAxIDAgMCAwLTEgMXYxMC42NmgtMjh2LTI4aDEwLjY4M2ExIDEgMCAwIDAgMC0ySDkuMjZhMSAxIDAgMCAwLTEgMXYzMGExIDEgMCAwIDAgMSAxaDMwYTEgMSAwIDAgMCAxLTF2LTExLjY2YTEgMSAwIDAgMC0xLTF6Ii8+PC9zdmc+');
}

.yii-debug-toolbar__ajax {
    position: relative;
}

.yii-debug-toolbar__ajax:hover .yii-debug-toolbar__ajax_info,
.yii-debug-toolbar__ajax:focus .yii-debug-toolbar__ajax_info {
    visibility: visible;
}
.yii-debug-toolbar__ajax_info {
    visibility: hidden;
    transition: visibility .2s linear;
    background-color: white;
    box-shadow: inset 0 -10px 10px -10px #e1e1e1;
    position: absolute;
    bottom: 40px;
    left: -1px;
    padding: 10px;
    max-width: 480px;
    max-height: 480px;
    word-wrap: break-word;
    overflow: hidden;
    overflow-y: auto;
    box-sizing: border-box;
    border: 1px solid rgba(0, 0, 0, 0.11);
    z-index: 1000001;
}
.yii-debug-toolbar__ajax a {
    color: #337ab7;
}
.yii-debug-toolbar__ajax table {
    width: 100%;
    table-layout: auto;
    border-spacing: 0;
    border-collapse: collapse;
}
.yii-debug-toolbar__ajax table td {
    padding: 4px;
    font-size: 12px;
    line-height: normal;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.yii-debug-toolbar__ajax table th {
    padding: 4px;
    font-size: 11px;
    line-height: normal;
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
.yii-debug-toolbar__ajax_request_status {
    color: white;
    padding: 2px 5px;
}
.yii-debug-toolbar__ajax_request_url {
    max-width: 170px;
    overflow: hidden;
    text-overflow: ellipsis;
}</style><script>(function () {
    'use strict';

    var findToolbar = function () {
            return document.querySelector('#yii-debug-toolbar');
        },
        ajax = function (url, settings) {
            var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            settings = settings || {};
            xhr.open(settings.method || 'GET', url, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('Accept', 'text/html');
            xhr.onreadystatechange = function (state) {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200 && settings.success) {
                        settings.success(xhr);
                    } else if (xhr.status != 200 && settings.error) {
                        settings.error(xhr);
                    }
                }
            };
            xhr.send(settings.data || '');
        },
        url,
        div,
        toolbarEl = findToolbar(),
        toolbarAnimatingClass = 'yii-debug-toolbar_animating',
        barSelector = '.yii-debug-toolbar__bar',
        viewSelector = '.yii-debug-toolbar__view',
        blockSelector = '.yii-debug-toolbar__block',
        toggleSelector = '.yii-debug-toolbar__toggle',
        externalSelector = '.yii-debug-toolbar__external',

        CACHE_KEY = 'yii-debug-toolbar',
        ACTIVE_STATE = 'active',

        animationTime = 300,

        activeClass = 'yii-debug-toolbar_active',
        iframeActiveClass = 'yii-debug-toolbar_iframe_active',
        iframeAnimatingClass = 'yii-debug-toolbar_iframe_animating',
        titleClass = 'yii-debug-toolbar__title',
        blockClass = 'yii-debug-toolbar__block',
        blockActiveClass = 'yii-debug-toolbar__block_active',
        requestStack = [];

    if (toolbarEl) {
        url = toolbarEl.getAttribute('data-url');

        ajax(url, {
            success: function (xhr) {
                div = document.createElement('div');
                div.innerHTML = xhr.responseText;

                toolbarEl.parentNode && toolbarEl.parentNode.replaceChild(div, toolbarEl);

                showToolbar(findToolbar());
            },
            error: function (xhr) {
                toolbarEl.innerHTML = xhr.responseText;
            }
        });
    }

    function showToolbar(toolbarEl) {
        var barEl = toolbarEl.querySelector(barSelector),
            viewEl = toolbarEl.querySelector(viewSelector),
            toggleEl = toolbarEl.querySelector(toggleSelector),
            externalEl = toolbarEl.querySelector(externalSelector),
            blockEls = barEl.querySelectorAll(blockSelector),
            iframeEl = viewEl.querySelector('iframe'),
            iframeHeight = function () {
                return (window.innerHeight * 0.7) + 'px';
            },
            isIframeActive = function () {
                return toolbarEl.classList.contains(iframeActiveClass);
            },
            showIframe = function (href) {
                toolbarEl.classList.add(iframeAnimatingClass);
                toolbarEl.classList.add(iframeActiveClass);

                iframeEl.src = externalEl.href = href;
                viewEl.style.height = iframeHeight();
                setTimeout(function() {
                    toolbarEl.classList.remove(iframeAnimatingClass);
                }, animationTime);
            },
            hideIframe = function () {
                toolbarEl.classList.add(iframeAnimatingClass);
                toolbarEl.classList.remove(iframeActiveClass);
                removeActiveBlocksCls();

                externalEl.href = '#';
                viewEl.style.height = '';
                setTimeout(function() {
                    toolbarEl.classList.remove(iframeAnimatingClass);
                }, animationTime);
            },
            removeActiveBlocksCls = function () {
                [].forEach.call(blockEls, function (el) {
                    el.classList.remove(blockActiveClass);
                });
            },
            toggleToolbarClass = function (className) {
                toolbarEl.classList.add(toolbarAnimatingClass);
                if (toolbarEl.classList.contains(className)) {
                    toolbarEl.classList.remove(className);
                } else {
                    toolbarEl.classList.add(className);
                }
                setTimeout(function () {
                    toolbarEl.classList.remove(toolbarAnimatingClass);
                }, animationTime);
            },
            toggleStorageState = function (key, value) {
                if (window.localStorage) {
                    var item = localStorage.getItem(key);

                    if (item) {
                        localStorage.removeItem(key);
                    } else {
                        localStorage.setItem(key, value);
                    }
                }
            },
            restoreStorageState = function (key) {
                if (window.localStorage) {
                    return localStorage.getItem(key);
                }
            },
            togglePosition = function () {
                if (isIframeActive()) {
                    hideIframe();
                } else {
                    toggleToolbarClass(activeClass);
                    toggleStorageState(CACHE_KEY, ACTIVE_STATE);
                }
            };

        toolbarEl.style.display = 'block';

        if (restoreStorageState(CACHE_KEY) == ACTIVE_STATE) {
            toolbarEl.classList.add(activeClass);
        }

        window.onresize = function () {
            if (toolbarEl.classList.contains(iframeActiveClass)) {
                viewEl.style.height = iframeHeight();
            }
        };

        barEl.onclick = function (e) {
            var target = e.target,
                block = findAncestor(target, blockClass);

            if (block && !block.classList.contains(titleClass)
                && e.which !== 2 && !e.ctrlKey // not mouse wheel and not ctrl+click
            ) {
                while (target !== this) {
                    if (target.href) {
                        removeActiveBlocksCls();
                        block.classList.add(blockActiveClass);
                        showIframe(target.href);
                    }
                    target = target.parentNode;
                }

                e.preventDefault();
            }
        };

        toggleEl.onclick = togglePosition;
    }

    function findAncestor(el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }

    function renderAjaxRequests() {
        var requestCounter = document.getElementsByClassName('yii-debug-toolbar__ajax_counter');
        if (!requestCounter.length) {
            return;
        }
        var ajaxToolbarPanel = document.querySelector('.yii-debug-toolbar__ajax');
        var tbodies = document.getElementsByClassName('yii-debug-toolbar__ajax_requests');
        var state = 'ok';
        if (tbodies.length) {
            var tbody = tbodies[0];
            var rows = document.createDocumentFragment();
            if (requestStack.length) {
                var firstItem = requestStack.length > 20 ? requestStack.length - 20 : 0;
                for (var i = firstItem; i < requestStack.length; i++) {
                    var request = requestStack[i];
                    var row = document.createElement('tr');
                    rows.appendChild(row);

                    var methodCell = document.createElement('td');
                    methodCell.innerHTML = request.method;
                    row.appendChild(methodCell);

                    var statusCodeCell = document.createElement('td');
                    var statusCode = document.createElement('span');
                    if (request.statusCode < 300) {
                        statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_success');
                    } else if (request.statusCode < 400) {
                        statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_warning');
                    } else {
                        statusCode.setAttribute('class', 'yii-debug-toolbar__ajax_request_status yii-debug-toolbar__label_error');
                    }
                    statusCode.textContent = request.statusCode || '-';
                    statusCodeCell.appendChild(statusCode);
                    row.appendChild(statusCodeCell);

                    var pathCell = document.createElement('td');
                    pathCell.className = 'yii-debug-toolbar__ajax_request_url';
                    pathCell.innerHTML = request.url;
                    pathCell.setAttribute('title', request.url);
                    row.appendChild(pathCell);

                    var durationCell = document.createElement('td');
                    durationCell.className = 'yii-debug-toolbar__ajax_request_duration';
                    if (request.duration) {
                        durationCell.innerText = request.duration + " ms";
                    } else {
                        durationCell.innerText = '-';
                    }
                    row.appendChild(durationCell);
                    row.appendChild(document.createTextNode(' '));

                    var profilerCell = document.createElement('td');
                    if (request.profilerUrl) {
                        var profilerLink = document.createElement('a');
                        profilerLink.setAttribute('href', request.profilerUrl);
                        profilerLink.innerText = request.profile;
                        profilerCell.appendChild(profilerLink);
                    } else {
                        profilerCell.innerText = 'n/a';
                    }
                    row.appendChild(profilerCell);

                    if (request.error) {
                        if (state !== "loading" && i > requestStack.length - 4) {
                            state = 'error';
                        }
                    } else if (request.loading) {
                        state = 'loading'
                    }
                    row.className = 'yii-debug-toolbar__ajax_request';
                }
                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }
                tbody.appendChild(rows);
            }
            ajaxToolbarPanel.style.display = 'block';
        }
        requestCounter[0].innerText = requestStack.length;
        var className = 'yii-debug-toolbar__label yii-debug-toolbar__ajax_counter';
        if (state == 'ok') {
            className += ' yii-debug-toolbar__label_success';
        } else if (state == 'error') {
            className += ' yii-debug-toolbar__label_error';
        }
        requestCounter[0].className = className;
    };

    var proxied = XMLHttpRequest.prototype.open;

    XMLHttpRequest.prototype.open = function (method, url, async, user, pass) {
        var self = this;
        /* prevent logging AJAX calls to static and inline files, like templates */
        if (url.substr(0, 1) === '/' && !url.match(new RegExp("{{ excluded_ajax_paths }}"))) {
            var stackElement = {
                loading: true,
                error: false,
                url: url,
                method: method,
                start: new Date()
            };
            requestStack.push(stackElement);
            this.addEventListener("readystatechange", function () {
                if (self.readyState == 4) {
                    stackElement.duration = self.getResponseHeader("X-Debug-Duration") || new Date() - stackElement.start;
                    stackElement.loading = false;
                    stackElement.statusCode = self.status;
                    stackElement.error = self.status < 200 || self.status >= 400;
                    stackElement.profile = self.getResponseHeader("X-Debug-Tag");
                    stackElement.profilerUrl = self.getResponseHeader("X-Debug-Link");
                    renderAjaxRequests();
                }
            }, false);
            renderAjaxRequests();
        }
        proxied.apply(this, Array.prototype.slice.call(arguments));
    };

})();</script><script src="/basic/web/assets/659d75dc/jquery.js"></script>
<script src="/basic/web/assets/abd27537/yii.js"></script>
<script src="/basic/web/assets/abd27537/yii.gridView.js"></script>
<script src="/basic/web/assets/6b77df6a/js/bootstrap.js"></script>
<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w0').yiiGridView({"filterUrl":"\/basic\/web\/index.php?r=product-category","filterSelector":"#w0-filters input, #w0-filters select"});
});</script></body>
</html>
