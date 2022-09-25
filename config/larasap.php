<?php

return [

    'telegram' => [
        'api_token' => '',
        'bot_username' => '',
        'channel_username' => '', // Channel username to send message
        'channel_signature' => '', // This will be assigned in the footer of message
        'proxy' => false,   // True => Proxy is On | False => Proxy Off
    ],

    'twitter' => [
        'consurmer_key' => 'ucrqMkkcoxPbrG5Lag1HF8xVb',
        'consurmer_secret' => 'HwSgDGwSfDGjz8gc8wgOfnegGjlMi6ret6TRqOofVR0ePa4Pmo',
        'access_token' => '1645422139-ga1sH8NpzCw6Iy13nh6GyALPaR3qkSeuTBrYGZI',
        'access_token_secret' => 'ELZYgnUc1tpZOf7KpJrm92JIJDx6h4kvkYNp8xG2SPx6k'
    ],
    //1652460254773293 secre d06ed1bd78dec10aab3f7b76cff3092f
    // 'facebook' => [
    //     'app_id' => '230830394321693',
    //     'app_secret' => '16329351e0cd0fb914f14f7aff9d8cbb',
    //     'default_graph_version' => 'v3.3',
    //     'page_access_token' => 'EAAXe52J9wC0BAHKXKZA7JVnu1M9A1aXPZBTh89ZAYQNZC5laisqUZC3bpYEiLFxfcOZA1ndZBlLDTRXnoHy4Le4eMPnZCr1xqBw3LRMNWora0xKo5f8XJO7X04L0g8TUz8oHbeGjUpEVkYRbRuw4whg4AesCtzvZBHliY8C7bWNDJTWxfZB4EQnl09'
    // ],
    'facebook' => [
        'app_id' => '161515759047642',
        'app_secret' => 'a66c05d2efe37d5925398608e45218bb',
        'default_graph_version' => 'v3.3',
        'page_access_token' => 'EAAXe52J9wC0BAHKXKZA7JVnu1M9A1aXPZBTh89ZAYQNZC5laisqUZC3bpYEiLFxfcOZA1ndZBlLDTRXnoHy4Le4eMPnZCr1xqBw3LRMNWora0xKo5f8XJO7X04L0g8TUz8oHbeGjUpEVkYRbRuw4whg4AesCtzvZBHliY8C7bWNDJTWxfZB4EQnl09'
    ],

    // Set Proxy for Servers that can not Access Social Networks due to Sanctions or ...
    'proxy' => [
        'type' => '',   // 7 for Socks5
        'hostname' => '', // localhost
        'port' => '' , // 9050
        'username' => '', // Optional
        'password' => '', // Optional
    ]
];
