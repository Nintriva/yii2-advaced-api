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
        var url = 'http://yiiapi.local/s?v=' + Math.random();
        $.ajax({
            url: url,
            data: {email: "bimal@nintriva.com"},
            headers: {
                authorization: "Bearer 1bGc5yB6cigrLsHvijO5z-kPJfIbCDnl"
            },
            method: 'POST',
            success: function (data) {
                console.log(data);
            },
            error: function (e) {
                console.log(e);
            }
        });

    })(jQuery);

JS;

$this->registerJs(
$JS
);
?>
<script>

</script>
