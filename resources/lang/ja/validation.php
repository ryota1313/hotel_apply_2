<?php

return [
    'required' => ':attributeは必須です。',
    'max' => [
        'string' => ':attributeは:max文字以内で入力してください。',
    ],
    'email' => ':attributeの形式が正しくありません。',
    'digits_between' => ':attributeは:min桁以上:max桁以下で入力してください。',
    'exists' => '選択された:attributeは無効です。',
    'date_format' => ':attributeの形式が正しくありません（HH:MMで入力してください）。',
    'after' => ':attributeは:date以降の時間を入力してください。',
    'integer' => ':attributeは整数で入力してください。',
    'min' => [
        'numeric' => ':attributeは:min以上を選択してください。',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下を選択してください。',
    ],

    // フィールド名を日本語に変換
    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'adress' => '住所',
        'phone_number' => '電話番号',
        'check_in' => 'チェックイン時間',
        'check_out' => 'チェックアウト時間',
        'people' => '予約人数',
        'plan_id' => 'プラン',
        'room_id' => '部屋'
    ],
];



