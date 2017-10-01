<?php
define('PAGE_SIZE', 4);
define('COMMENT_PAGE_SIZE', 30);
define('APP_STORE_ID', 9);
define('YINGYONG_ID', 7);
define('WANDOU_ID', 8);
define('BAIDU_ID', 10);
define('_360_ID', 12);
define('MI_ID', 13);
define('OPPO_ID', 17);
define('MEZUI_ID', 19);

function curl_get($url)
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function getComment($startDate, $endData, $gameId, $nextPage, $maxPage, $categoryId)
{
    return curl_get("http://fsight.qq.com/DataSearchAjax?startDate=$startDate 00:00:00&endDate=$endData 23:59:00" .
        "&keywords=&entityId=0&gameId=$gameId&nextPage=$nextPage&maxPage=$maxPage&currentPage=0&rank=0&isTitle=1&orderBy=2&categoryId=$categoryId&cateType=2" .
        "&filterRubbish=1&or_and=and&_=1492401451546");
}

//导入时，Excel的格式设定
function ExcelConfig()
{
    static $ExcelConfig = array(
        'hasHeader' => true,    //Excel表是否允许标题行
        //标题行在数据读取时被忽略
        'header' => array(        //哪些行被当作标题行处理
            1, 2
        ),
        'columns' => array(       //有哪些列以及对应数据库的字段
            'A' => 'AID',
            'B' => 'from_who',
            'C' => 'from_where',
            'D' => 'from_ID',
            'E' => 'rating',
            'F' => 'text',
            'G' => 'time',
            'H' => 'tasty'
        ),
        'sheets' => array(          //需要读取的信息所处的工作簿
            0                     //0表示第一个工作簿，1表示第二个，依次类推
        )
    );
    return $ExcelConfig;
}

