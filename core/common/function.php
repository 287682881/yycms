<?php
    function p($var)
    {
        if (is_bool($var))
        {
            var_dump($var);
        }else if (is_null($var))
        {
            var_dump(NULL);
        }else
        {
            echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;

            background: -webkit-linear-gradient(left,rgba(255,0,0,0),rgba(255,0,0,1)); /* Safari 5.1 - 6 */
            background: -o-linear-gradient(right,rgba(255,0,0,0),rgba(255,0,0,1)); /* Opera 11.1 - 12*/
            background: -moz-linear-gradient(right,rgba(255,0,0,0),rgba(255,0,0,1)); /* Firefox 3.6 - 15*/
            background: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1)); /* 标准的语法 */
            
            border:1px solid #ccc;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
        }

    }
