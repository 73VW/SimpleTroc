<?php
//adds a provider for Heroku
$filename = __DIR__."/config/app.php";
$pattern = '/(\'providers\' => \[)(.*?)(\].)/s';
$classToAdd = "Fideloper\Proxy\TrustedProxyServiceProvider::class,";
resourceAdder($filename, $pattern, $classToAdd);

//adds a middleware for Heroku
$filename =__DIR__."/app/Http/Kernel.php";
$pattern = '/(\$middleware = \[)(.*?)(\];)/s';
$classToAdd = "\Fideloper\Proxy\TrustProxies::class,";
resourceAdder($filename, $pattern, $classToAdd);

//function used to add the $classToAdd in $filename where $pattern is a match
function resourceAdder($filename, $pattern, $classToAdd) {
    $content = file_get_contents($filename) or die("Unable to open file!");
    //can't use preg_replace because it replaces not variable content only
    //but variable declaration too
    $content = preg_replace($pattern, "$1$2".$classToAdd.PHP_EOL."$3", $content);
    file_put_contents($filename, $content);
}
?>
