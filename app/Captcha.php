<?php
/**
 * Created by PhpStorm.
 * User: -
 * Date: 02.09.2018
 * Time: 19:07
 */

namespace App;


use Zttp\Zttp;

class Captcha
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $response = Zttp::asFormParams()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('captcha.keys.secret'),
                'response' => request('g-recaptcha-response'),
                'remoteip' => request()->ip()
            ]);

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }
}
