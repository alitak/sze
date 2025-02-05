<?php

declare(strict_types=1);

$variable = 'Hello World!';
$variable = 5.5;
$variable = 5;
$variable = false;

//echo $variable;
#echo $variable;
/*
 * több soros komment
 */
//var_dump($variable);

//$array = array('a', 'b');
$array = [
    'a',
    'b',
    5,
    '5',
    "5",
    [true],
    (object)[true],
    null,
];
//count($array);
//$foo = null;
//echo '..::DEBUGGING::..';
//echo '<pre>';
//var_dump($array);
//echo '</pre>';
//exit;
//print_r($array);


//$foo = "1a";
//$bar = 2;
//
//echo $foo . $bar;
//echo $foo + $bar;
//
//$foo = 'abc';
//$bar = 'def$foo';
//$bar = 'def' . $foo;
//$bar = "def$foo";
//
//echo $bar;

//$foo = 'bar';
//$bar = 'baz';
//
//echo $$foo;


//var_dump("hello" == "hello");
//var_dump("hello" == 'hello');
//var_dump(1 == 1);
//var_dump(1 == '1a');
//var_dump("1" == '1');
//var_dump("1" == true); // true
//var_dump(1 == true); // true
//var_dump(1.0 == true); // true
//var_dump([1.0] == true); // true
//var_dump((object)[1.0] == true); // true
//var_dump([1.0, 2.0] == true); // true
//var_dump([] == false);
//var_dump("" == false);
//var_dump(0 == false);
//var_dump(0.0 == false);
//var_dump(null == false);

//var_dump([] === false);
//var_dump("" === false);
//var_dump(0 === false);
//var_dump(0.0 === false);
//var_dump(null === false);
//var_dump(false === false);

//var_dump(40 <=> 3); // 1
//var_dump(3 <=> 3); // 0
//var_dump(3 <=> 40); // -1

//var_dump("foo" > 5);
