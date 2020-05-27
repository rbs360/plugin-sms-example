
{css static}
<link href="$app_path/css/#name.css" rel="stylesheet" media="all" />
{/css}
{js static}
<script type="text/javascript" src="$app_path/js/#name.js"></script>
{/js}
#include <fields>
#include <container>
 
[[css | name: style]]


{CALLBACK_LINK}
<div class="ui green message font-rel">
  <div class="header font-rel">
    Базовый адрес для принятия уведомлений:
  </div>
    <br>
  $link
</div>
{/CALLBACK_LINK}

[[CONTAINER | h: hide]]
    [[field | name: login | type: input| parentClass: w-100 | addLabel: $Login$ | required:required-mode | value: $login$]]
    [[field | name: password | type: input | ftype: password | parentClass: w-100 | addLabel: $Password$ | required:required-mode | value: $password$]]
    [[field | name: sadr | type: input| parentClass: w-100 | addLabel: $Sender$ | required:required-mode | value: $sadr$]]
    [[field | name: url | type: input| parentClass: w-100 | addLabel: $URL$ | required:required-mode | value: $url$]]
[[CONTAINER_END]]

[[js | name: main]] 
