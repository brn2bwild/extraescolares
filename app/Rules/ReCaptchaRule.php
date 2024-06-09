<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCaptchaRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = http_build_query([
            'secret' => config('services.recaptcha.secret'),
            'response' => $value,
        ]);

        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('success');

        if ($captchaLevel !== true) {
            $fail('Debes completar el reCaptcha para continuar');
        }
    }
}
