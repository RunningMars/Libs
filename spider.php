<?php
set_time_limit(0);


var_dump(preg_match('/src=\"(.*?)\" title=\"点击看大图\" alt=\"(*)\"/','<img src="https://img3.doubanio.com/view/subject/l/public/s10877741.jpg" title="点击看大图" alt="Saint Francis of Assisi" rel="v:photo" style="width: 135px">'));

//for ($pageno = 1 ; $pageno < 18; $pageno ++) {
//    preg_replace_callback('/src=\"(.*?)\" title=\"点击看大图\" alt=\"(*)\"/',function($matches) use($pageno){
//        var_dump($matches);
//        copy('http:'.str_replace('small', 'big',$matches[1]),'m/'.basename($matches[1]));
//        file_put_contents('s/'.basename($matches[1]),file_get_contents($matches[1]));
//            var_dump(file_get_contents('http:'.$matches[1]));
//    },file_get_contents('https://book.douban.com/subject/'.$pageno));
//}

//for ($pageno = 1 ; $pageno < 18; $pageno ++) {
//    preg_replace_callback('/class=\"joke-main-img\" src=\"(.*?)\"/',function($matches) use($pageno){
//            copy('http:'.str_replace('small', 'big',$matches[1]),'m/'.basename($matches[1]));
//    },file_get_contents('http://www.haha.mx/topic/1/new/'.$pageno));
//}

//title="点击看大图"