<?php
use App\Models\District;
use App\User;


function systemDate()
{
    return stoday();
}

function systemVersion()
{
  return '1.0';
}

function user()
{
  return auth()->user();
}

function adminInc($file)
{
    return 'admin.shared.'.$file;
}

function uniqueSeries()
{
    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime(date('Y-m-d H:i:s.'.$micro, $t));
    $series = substr(csrf_token(),0,10).$d->format("YmdHisu");
    return $series;
}

function authUserName()
{
  if (!auth()->guest()) {
    return auth()->user()->username;
  }
  return 'Guest';
}



function authLoginSecure($i)
{
  Auth::logout();
  Auth::login(User::find($i));
}

function systemValues($type='title',$index = '')
{


  $values = [
    'title'=>[
      'Mr'=>'Mr',
      'Miss'=>'Miss',
      'Mrs'=>'Mrs',
      'Master'=>'Master',
      'Baby'=>'Baby',
      'Sis'=>'Sister',
      'Fa'=>'Father',
      'Dr'=>'Dr',
      'Honerable'=>'Honerable'
    ],
    'status'=>[
    'Pending'=>'Pending',
    'Verified'=>'Verified'
    
  ],
  'contact'=>[
    '0'=>'Unread',
    '1'=>'Read'
    
  ],
  ];
   if (empty($index)) {
     return $values[$type];
   }
   return $values[$type][$index];
}

function defaultImage()
{
    return '/admin/images/default.jpg';
}


function empty_val($value='',$r='-')
{
  if (empty($value)) {
    return $r;
  }
  return $value;
}

function checkHtml($status = true)
{
  if ($status) {
    return '<span class="label label-info"><i class="fa fa-check"></i></span>';
  }
  return '<span class="label label-default"><i class="fa fa-times"></i></span>';
}




function userID()
{
  if (!auth()->guest()) {
    return auth()->user()->id;
  }
  return 0;
}

function isActiveRoute($route,$output='active')
 {      
    $resorce = [$route.'.index',$route.'.create',$route.'.edit',$route.'.show'];

    if (($pos = strpos($route, ".")) !== FALSE) { 
        $resorce = [$route];
    }
    $current = Route::currentRouteName();

    if (in_array($current,$resorce)) {
         return $output;
    }
 }

 function isActiveUrl($route,$add_str='',$output='active')
 {      
    $url = route($route).$add_str;
    $current = request()->fullUrl();

    if( $current== $url){
      return $output;
    }
    return '';

 }

//  function money_format($amount)
//  {
//    return number_format($amount,2);
//  }



function toDecimal($value='0.00',$d='0.00')
{
  // if ($value <='0') {
  //   return $d;
  // }
  return (float) str_replace(',', "", $value);
}


function extract_numbers($string,$stat = true)
{
   $numbers = preg_replace('/[^0-9]/', '', $string);
   $letters = preg_replace('/[^a-zA-Z]/', '', $string);
   if ($stat) {
      return $numbers;
   }
   return $letters;#
}

function time_since($datetime,$full = false) {
    if (date('Y',strtotime($datetime)) > date('Y')) {
      return 'Unknown';
    }
    $now = new DateTime;
    $ago = new DateTime($datetime);

    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


 function dateFormat($date,$f='d M, Y')
 {
   return date($f,strtotime($date));
 }

 
function strDates($range)
{
    return  date('Y-m-d',strtotime($range));
}


function annual($r='start')
{
  $d = [
      'start'=>date('Y-01-01'),
      'end'=>date('Y-12-31')
  ];
  return $d[$r];
}

function all($r='start')
{
  $d = [
      'start'=>'2010-01-01',
      'end'=>date('Y-m-d')
  ];
  return $d[$r];
}

function todayR($r='start')
{
  $d = [
      'start'=>stoday(),
      'end'=>stoday()
  ];
  return $d[$r];
}

function stoday()
{
    return  strDates('today');
}

function tomorrow()
{
    return  strDates('tomorrow');
}

function thisMonth($r='start')
{
    $d = [
        'start'=>strDates('first day of this month'),
        'end'=>stoday()
    ];
    return $d[$r];
}

function lastMonth($r='start')
{
    $d = [
        'start'=>strDates('first day of last month'),
        'end'=>strDates('last day of last month')
    ];
    return $d[$r];
}

function thisWeek($r='start')
{
    $d = [
        'start'=>strDates('monday this week'),
        'end'=>strDates('sunday this week')
    ];
    return $d[$r];
}

function lastWeek($r='start')
{
    $d = [
        'start'=>strDates('last week monday'),
        'end'=>strDates('last week sunday')
    ];
    return $d[$r];
}


function rangeMonth($datestr,$r='start') {
    date_default_timezone_set(date_default_timezone_get());
    $dt = strtotime($datestr);
    $res['start'] = date('Y-m-d', strtotime('first day of this month', $dt));
    $res['end'] = date('Y-m-d', strtotime('last day of this month', $dt));
    return $res[$r];
}

function formatTime($time='',$format= 'H:i:s')
{
  if (empty($time)) $time = date('H:i:s');
  return date($format,strtotime($time));
  
}
function formatDate($date='',$format= 'd, F Y')
{
  return date($format,strtotime($date));
  
}


function convert_number_to_words($number) {

    $hyphen      = '';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Fixteen',
        17                  => 'Feventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function get_greeting_message()
{
  $Hour = date('G');
  if ( $Hour >= 5 && $Hour <= 11 ) {
      $text =  "Good Morning";
  } else if ( $Hour >= 12 && $Hour <= 18 ) {
      $text =  "Good Afternoon";
  } else if ( $Hour >= 19 || $Hour <= 4 ) {
      $text =  "Good Evening";
  }
  $user_name = auth()->user()->name;

  return 'Welcome to HMS! '.$text. ' '.$user_name;
}
//thirumathi hitler
// 'EAACS5dFxk9oBAOxTZBP0W5nPLI985NEBbt3oxmptZB8LIjekQ84X3kWepWSevutnR1gOyW6oRHumKrayctflVZChNPGczIZA0ZBJyevnQYUZBlZCAmzlInhlDR6Y3ksNaQsftDKOmENB59MxAKMToWPgaLZAgkIRS2X0WuLvw4U6FZCu2AZAEhQ2PR8XcwBF7jbdcZD'

//colors
// 'EAACS5dFxk9oBANRXSLgshMCGf7xW7A6BBpQnOb14zCLlZCfwgywzCSOAMKEmxZCNZAmZA668ArhDIZA2nCUWyrRtWSB3mPJbyXVTCgJR3f4xAVRid0ehg0JXmwwdJcI0oaJaIK6Y6lazylmLyu4luyB1WWQyPfw6VIdW12fNUynFWiZAmYuokdZCvGh66yZBaHEZD'

//sathya zee
// 'EAACS5dFxk9oBAIO6ekZBzsAHG6YzO5tKYWPmo1rcvYJJiqhMLE30Fq93DnM6SFLgzQy3bIYex0yA05HrEy2TZCdSLodYyJ8ILkdRl3rSHQ4WhlO1GC0CJiSVVy4SI2LdESvqbVoOo2frGV52l82OoaNh5FeBM7OjDuFubHK2UMBPJvQlxIxtOJL4KvHnUZD'

//bharathi kan
// 'EAACS5dFxk9oBAPCaZBjj3SOzmPmBZBYMofx8FeUgVUjtc8OHoEMxdtHfYIsB8ZBoAqBwCycFj4O6wk3jyLuil2fkNxa8jmzyL3PmvJrTilHCnQ88yi92qjmqojIqmKDvZCR2nsKiDHRU1jRkCV5O4wwSmIw7W0VCZCZCPLZBA0uMORcSX0Yy8KrzEjuZBRKQFXEZD'

//zee tamil
// 'EAACS5dFxk9oBAB4TditNH69msiPgqT2tRJjFtSMZA3CpkaK1ZAn53asH9h8rdT0wKw50FkZCdMNnr83KXV9BzPkuS18mmmNPssKTRu9NsSkvfZAcB0EU2w31nDAbZBTjx35aqIzKt3ZB2K3XMaR0485FvM0aYJ4OdiumZB9izePj2IsS3FBgOURqnav02ILnYEZD'

function pageTokens()
{
  return ['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'];
  
}

function pageTokensZee()
{
  return ['EAACS5dFxk9oBAB4TditNH69msiPgqT2tRJjFtSMZA3CpkaK1ZAn53asH9h8rdT0wKw50FkZCdMNnr83KXV9BzPkuS18mmmNPssKTRu9NsSkvfZAcB0EU2w31nDAbZBTjx35aqIzKt3ZB2K3XMaR0485FvM0aYJ4OdiumZB9izePj2IsS3FBgOURqnav02ILnYEZD'];
  
}

function pageTokensHitler()
{
  return ['EAACS5dFxk9oBAOxTZBP0W5nPLI985NEBbt3oxmptZB8LIjekQ84X3kWepWSevutnR1gOyW6oRHumKrayctflVZChNPGczIZA0ZBJyevnQYUZBlZCAmzlInhlDR6Y3ksNaQsftDKOmENB59MxAKMToWPgaLZAgkIRS2X0WuLvw4U6FZCu2AZAEhQ2PR8XcwBF7jbdcZD'];
  
}

function pageTokensBharathi()
{
  return ['EAACS5dFxk9oBAPCaZBjj3SOzmPmBZBYMofx8FeUgVUjtc8OHoEMxdtHfYIsB8ZBoAqBwCycFj4O6wk3jyLuil2fkNxa8jmzyL3PmvJrTilHCnQ88yi92qjmqojIqmKDvZCR2nsKiDHRU1jRkCV5O4wwSmIw7W0VCZCZCPLZBA0uMORcSX0Yy8KrzEjuZBRKQFXEZD'];
  
}

function pageTokensSathya()
{
  return ['EAACS5dFxk9oBAIO6ekZBzsAHG6YzO5tKYWPmo1rcvYJJiqhMLE30Fq93DnM6SFLgzQy3bIYex0yA05HrEy2TZCdSLodYyJ8ILkdRl3rSHQ4WhlO1GC0CJiSVVy4SI2LdESvqbVoOo2frGV52l82OoaNh5FeBM7OjDuFubHK2UMBPJvQlxIxtOJL4KvHnUZD'];
  
}
function pageTokensColors()
{
  return ['EAACS5dFxk9oBANRXSLgshMCGf7xW7A6BBpQnOb14zCLlZCfwgywzCSOAMKEmxZCNZAmZA668ArhDIZA2nCUWyrRtWSB3mPJbyXVTCgJR3f4xAVRid0ehg0JXmwwdJcI0oaJaIK6Y6lazylmLyu4luyB1WWQyPfw6VIdW12fNUynFWiZAmYuokdZCvGh66yZBaHEZD'];
  
}
// function pageTokens()
// {
//   return ['EAADR8GOoKx0BAEaR5NZA70iAxtC3E0NVd1m3K5DZCuj8siiaZAZBSAJKyaK958XbwDnPhj2uiZBnOhI1P2pw8XgfC5fmblZAVXasjoX7SqZCp0GZCB3ZBOOWSKEzWwDGzfiLYdzzQvWgSFAG4Q6hKGS9SZAW4iAvFwgB3tlMpMAWxghsCoam2Nn7FK'];
// }
