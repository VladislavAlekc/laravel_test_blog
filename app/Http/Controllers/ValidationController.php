<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'], // для строки min/max проверяет кол-во символов
            'last_name' => ['nullable', 'string', 'max:50'],
            'age' => ['nullable', 'integer', 'min:18', 'max:50'], // для числа min/max проверяет само число, integer - целое число
            'amount' => ['required', 'numeric', 'min:1', 'max:9999999'], // сумма перевода, numeric - проверяет число через запятую 123.45 (работа с валютой)
            'gender' => ['nullable', 'string', 'in:male,female'],
            'zip' => ['required', 'digits:6'], // почтовый индекс из 6 символов
            'subscription' => ['nullable', 'boolean'], // подписки на обновления (чекбоксы)
            'agreement' => ['accepted'], // соглашение должен принять всегда
            'password' => ['required', 'string', 'min:7', 'confirmed'], // confirmed - проверяет схожесть с полем password_confirmation
            'current_password' => ['required', 'string', 'current_password'], // проверка текущего пароля
            'email' => ['required', 'string', 'email', 'exists:users,email'], // проверяет есть ли значение в BD в табл users в поле email 
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'phone' => ['required', 'string', 'unique:users,phone'], // unique - проверяет нет ли такого поля в BD
            'website' => ['nullable', 'string', 'url'],   // https://example.com
            'uuid' => ['nullable', 'string', 'uuid'],   // asdasd-asdasd-asdasd-asdasd
            'ip' => ['nullable', 'string', 'ip'], // 127.0.0.1
            'avatar' => ['required', 'file', 'image', 'max:1024'],
            'birth_date' => ['nullable', 'string', 'date'], // 2021-10-10/10-10-2021 12:30:00
            'start_date' => ['required', 'string', 'date', 'after_or_equal:today'], // промо акция дата начала 
            'finish_date' => ['required', 'string', 'date', 'after:start_date'], // окончание 
            'services' => ['nullable', 'array', 'min:1', 'max:10'], // [1,2,3,4,5]
            'delivery' => ['nullable', 'array', 'size:2'], // ['date'=>'10-10-2012', 'time' => '12:30:00']
        ]);
        dd($validated);
    }
}
