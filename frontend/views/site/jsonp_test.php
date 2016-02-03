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

    (function ($) {
        var url = 'http://yiiapi.local/users/search?v=' + Math.random();
        $.ajax({
            url: url,
            data: {email: "bimal@nintriva.com"},
            headers: {
                authorization: "Bearer 1bGc5yB6cigrLsHvijO5z-kPJfIbCDnl"
            },
            method: 'POST',
             success: function (data) {
                console.log(data);
                $("#content").html(JSON.stringify(data, undefined, 2));
            },
            error: function (e) {
                console.log(e);
                $("#error").html(JSON.stringify(e.responseJSON, undefined, 2));
            }
        });

    })(jQuery);

JS;

$this->registerJs(
$JS
);
?>

<pre id="content" style="color: darkgreen"></pre>
<pre id="error" style="color: red"></pre>