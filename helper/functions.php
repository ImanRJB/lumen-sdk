<?php

use Illuminate\Support\Carbon;

if (!function_exists('lumen_config_path')) {
    function lumen_config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('lumen_database_path')) {
    function lumen_database_path($path = '')
    {
        return app()->basePath() . '/database/migrations' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('app_path')) {

    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('getNameWithIban')) {
    function getNameWithIban($iban)
    {
        $code = substr($iban, 2, 3);
        switch ($code) {
            case '055':
                return ['bank_name' => 'Eghtesad Novin', 'label' => 'اقتصاد نوین', 'code' => 'en'];
            case '054':
                return ['bank_name' => 'Parsian', 'label' => 'پارسیان', 'code' => 'parsian'];
            case '057':
                return ['bank_name' => 'Pasargad', 'label' => 'پاسارگاد', 'code' => 'bpi'];
            case '021':
                return ['bank_name' => 'Iran Post Bank', 'label' => 'پست بانک', 'code' => 'post'];
            case '018':
                return ['bank_name' => 'Tejarat', 'label' => 'تجارت', 'code' => 'tejarat'];
            case '051':
                return ['bank_name' => 'Moasese Etebari Tose-e', 'label' => 'موسسه اعتباری توسعه', 'code' => 'tt'];
            case '020':
                return ['bank_name' => 'Tose-e Saderat', 'label' => 'توسعه تجارت', 'code' => 'tt'];
            case '013':
                return ['bank_name' => 'Refah', 'label' => 'رفاه', 'code' => 'rb'];
            case '056':
                return ['bank_name' => 'Saman', 'label' => 'سامان', 'code' => 'sb'];
            case '015':
                return ['bank_name' => 'Sepah', 'label' => 'سپه', 'code' => 'sepah'];
            case '058':
                return ['bank_name' => 'Sarmayeh', 'label' => 'سرمایه', 'code' => 'sarmayeh'];
            case '019':
                return ['bank_name' => 'Saderat Iran', 'label' => 'صادرات ایران', 'code' => 'bsi'];
            case '011':
                return ['bank_name' => 'Sanat Madan', 'label' => 'صنعت و معدن', 'code' => 'bim'];
            case '053':
                return ['bank_name' => 'Kar Afarin', 'label' => 'کارآفرین', 'code' => 'kar'];
            case '016':
                return ['bank_name' => 'Keshavarzi', 'label' => 'کشاورزی', 'code' => 'bki'];
            case '010':
                return ['bank_name' => 'Central Bank', 'label' => 'مرکزی', 'code' => null];
            case '014':
                return ['bank_name' => 'Maskan', 'label' => 'مسکن', 'code' => 'maskan'];
            case '012':
                return ['bank_name' => 'Mellat', 'label' => 'ملت', 'code' => 'mellat'];
            case '017':
                return ['bank_name' => 'Melli Iran', 'label' => 'ملی', 'code' => 'bmi'];
            default:
                return ['bank_name' => 'Unknown', 'label' => 'سایر', 'code' => null];
        }
    }
}

if (!function_exists('getNameWithCard')) {
    function getNameWithCard($card)
    {
        $code = substr($card, 0, 6);
        switch ($code) {
            case '603799':
                return ['label' => 'ملی', 'code' => 'bmi'];
            case '589210':
                return ['label' => 'سپه', 'code' => 'sepah'];
            case '627648':
                return ['label' => 'توسعه صادرات', 'code' => 'edbi'];
            case '627961':
                return ['label' => 'صنعت و معدن', 'code' => 'bim'];
            case '603770':
                return ['label' => 'کشاورزی', 'code' => 'bki'];
            case '628023':
                return ['label' => 'مسکن', 'code' => 'maskan'];
            case '627760':
                return ['label' => 'پست بانک', 'code' => 'post'];
            case '502908':
                return ['label' => 'توسعه تعاون', 'code' => 'tt'];
            case '627412':
                return ['label' => 'اقتصاد نوین', 'code' => 'en'];
            case '622106':
                return ['label' => 'پارسیان', 'code' => 'parsian'];
            case '502229':
                return ['label' => 'پاسارگاد', 'code' => 'bpi'];
            case '627488':
                return ['label' => 'کارآفرین', 'code' => 'kar'];
            case '621986':
                return ['label' => 'سامان', 'code' => 'sb'];
            case '639346':
                return ['label' => 'سینا', 'code' => 'sina'];
            case '639607':
                return ['label' => 'سرمایه', 'code' => 'sarmayeh'];
            case '636214':
                return ['label' => 'آینده', 'code' => 'ba'];
            case '502806':
                return ['label' => 'شهر', 'code' => 'shahr'];
            case '502938':
                return ['label' => 'دی', 'code' => 'day'];
            case '603769':
                return ['label' => 'صادرات', 'code' => 'bsi'];
            case '610433':
                return ['label' => 'ملت', 'code' => 'mellat'];
            case '627353':
                return ['label' => 'تجارت', 'code' => 'tejarat'];
            case '589463':
                return ['label' => 'رفاه', 'code' => 'rb'];
            case '627381':
                return ['label' => 'انصار', 'code' => 'ansar'];
            case '639370':
                return ['label' => 'مهر اقتصاد', 'code' => 'sepah'];
            default:
                return ['label' => 'سایر', 'code' => null];
        }
    }
}

if (!function_exists('randomString')) {
    function randomString($length = 10, $strtoupper = true)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        if ($strtoupper) {
            return strtoupper($randomString);
        }
        return $randomString;
    }
}

if (!function_exists('addAmount')) {
    function addAmount(string $num1, string $num2, ?int $scale = 18)
    {
        $bcadd = bcadd($num1, $num2, $scale);
        $rtrim = rtrim($bcadd, '0');
        return rtrim($rtrim, '.');
    }
}

if (!function_exists('subAmount')) {
    function subAmount(string $num1, string $num2, ?int $scale = 18)
    {
        $bcsub = bcsub($num1, $num2, $scale);
        $rtrim = rtrim($bcsub, '0');
        return rtrim($rtrim, '.');
    }
}

if (!function_exists('mulAmount')) {
    function mulAmount(string $num1, string $num2, ?int $scale = 18)
    {
        $bcmul = bcmul($num1, $num2, $scale);
        $rtrim = rtrim($bcmul, '0');
        return rtrim($rtrim, '.');
    }
}

if (!function_exists('divAmount')) {
    function divAmount(string $num1, string $num2, ?int $scale = 18)
    {
        $bcdiv = bcdiv($num1, $num2, $scale);
        $rtrim = rtrim($bcdiv, '0');
        return rtrim($rtrim, '.');
    }
}

if (!function_exists('config_path')) {
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}