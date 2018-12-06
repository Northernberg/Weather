<?php

namespace Anax\Models;

class CurlWrap
{
    public function curl($api)
    {
        $multi = array();
        $res = array();
        $multiHandler = curl_multi_init();
        foreach ($api as $i => $url) {
            $multi[$i] = curl_init($url);
            curl_setopt($multi[$i], CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($multiHandler, $multi[$i]);
        }
        $index = null;
        do {
            curl_multi_exec($multiHandler, $index);
        } while ($index > 0);

        foreach ($multi as $k => $ch) {
            $res[$k] = json_decode(curl_multi_getcontent($ch), true);
            curl_multi_remove_handle($multiHandler, $ch);
        }
        curl_multi_close($multiHandler);
        return $res;
    }
}
