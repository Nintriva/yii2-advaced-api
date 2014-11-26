<?php
/**
 * Created by PhpStorm.
 * User: francis
 * Date: 26/11/14
 * Time: 1:50 PM
 */
$JSHead = <<<JSHead
function jsonCallback(data){
    console.log(data);
    alert(data.message);
}
JSHead;
$this->registerJs(
    $JSHead,
    \yii\web\View::POS_HEAD
);

$JS = <<<JS
(function($) {
var url = 'http://yiiapi.local/site/index?callback=?';
$.ajax({
   type: 'GET',
    url: url,
    async: false,
    jsonpCallback: 'jsonCallback',
    contentType: "application/json",
    dataType: 'jsonp',
    error: function(e) {
       console.log(e);
    }
});

})(jQuery);
JS;

$this->registerJs(
    $JS
);
?>