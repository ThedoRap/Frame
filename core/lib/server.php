<?php


namespace core\lib;


class server
{
    static $server;


    static public function server()
    {
        self::$server = $_SERVER;
    }

    /*移动端判断*/
    static public function is_device()
    {
        $server = self::$server;
        if (empty($server)) {
            self::server();
        }
        $useragent = isset(self::$server['HTTP_USER_AGENT']) ? self::$server['HTTP_USER_AGENT'] : '';
        $useragent_commentsblock = preg_match('|\(.*?\)|', $useragent, $matches) > 0 ? $matches[0] : '';
        function CheckSubstrs($substrs, $text)
        {
            foreach ($substrs as $substr)
                if (false !== strpos($text, $substr)) {
                    return true;
                }
            return false;
        }

        $mobile_os_list = array('Google Wireless Transcoder', 'Windows CE', 'WindowsCE', 'Symbian', 'Android', 'armv6l', 'armv5', 'Mobile', 'CentOS', 'mowser', 'AvantGo', 'Opera Mobi', 'J2ME/MIDP', 'Smartphone', 'Go.Web', 'Palm', 'iPAQ');
        $mobile_token_list = array('Profile/MIDP', 'Configuration/CLDC-', '160×160', '176×220', '240×240', '240×320', '320×240', 'UP.Browser', 'UP.Link', 'SymbianOS', 'PalmOS', 'PocketPC', 'SonyEricsson', 'Nokia', 'BlackBerry', 'Vodafone', 'BenQ', 'Novarra-Vision', 'Iris', 'NetFront', 'HTC_', 'Xda_', 'SAMSUNG-SGH', 'Wapaka', 'DoCoMo', 'iPhone', 'iPod');

        $found_mobile = CheckSubstrs($mobile_os_list, $useragent_commentsblock) ||
            CheckSubstrs($mobile_token_list, $useragent);

        if ($found_mobile) {
            return true;
        } else {
            return false;
        }
    }

    /*
    * 获取用户真实IP地址
    */
    static public function get_ip()
    {
        $server = self::$server;
        if (empty($server)) {
            self::server();
        }
        if (!empty(self::$server['HTTP_CLIENT_IP'])) {
            $cip = self::$server['HTTP_CLIENT_IP'];
        } else if (!empty(self::$server['HTTP_X_FORWARDED_FOR'])) {
            $cip = self::$server["HTTP_X_FORWARDED_FOR"];
        } else if (!empty(self::$server["REMOTE_ADDR"])) {
            $cip = self::$server["REMOTE_ADDR"];
        } else {
            $cip = '';
        }
        preg_match("/[\d\.]{7,15}/", $cip, $cips);
        $cip = isset($cips[0]) ? $cips[0] : 'unknown';
        unset($cips);
        return $cip;
    }
}
