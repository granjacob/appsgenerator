<?php
$BET = 1000;
for ($i = 0; $i < 28; $i++) {

    $number = str_pad(rand(0,10000), 4, "0", STR_PAD_LEFT);
    $day = $i + 1;
    $PRICE = ($BET*$day);
    echo $day . " : " . $number . ":" . $PRICE . "<br/>";
}

exit;

// 0 = WHITE
// 1 = BLACK
// 2 = YELLOW
// 3 = CREAM BLUE
// 4 = LIGHTLY BROWN
// 5 = ORANGE
// 6 = FOREST GREEN
// 7 = EMERALD GREEN
// 8 = RED
// 9 = DARK BROWN

$colors = array(
        "#FFFFFF",
        "#000000",
        "#FFFF00",
        "#1BB7FF",
        "#9E3700",
        "#FFA500",
        "#0A5100",
        "#028A0F",
        "#FF0000",
        "#341200"
);

$letterColors = array("a" => "#Cbefd0",
"b" => "#8faf93",
"c" => "#Dadfda",
"d" => "#Abd7e1",
"e" => "#417abe",
"f" => "#E5c8e3",
"g" => "#B3d699",
"h" => "#C3c3d8",
"i" => "#484848",
"j" => "#73470c",
"k" => "#31c90c",
"l" => "#94BCD6",
"m" => "#81614E",
"n" => "#D47a44",
"o" => "#F0F59E",
"p" => "#A86d0d",
"q" => "#D4730d",
"r" => "#7D7D7C",
"s" => "#EAEAC2",
"t" => "#9191a4",
"u" => "#661906",
"v" => "#411105",
"w" => "#A6c911",
"x" => "#000000",
"y" => "#380473",
"z" => "#Ffcf83", " " => "#ffffff" );

class Numbelor {
    private $number;
    private $color;

    public function __construt()
    {
        $this->color = array();
    }
    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        global $letterColors;
        $this->number = "" . $number;
        for ($i = 0; $i < strlen( $this->number ); $i++) {
            $this->color[] = $letterColors[$this->number[$i]];
        }
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }


    public function printNumberWithColor()
    {

        ?>
        <div class="numcolor">
            <span class="colorNum"><?php echo $this->number; ?></span>

            <?php for ($i = 0; $i < count( $this->color ); $i++) {?>
            <span class="color" style="background-color:<?php echo $this->color[$i]; ?>">

            </span>
            <?php } ?>
        </div>
        <?php

    }


    public function printNpectrumColor()
    {

        ?>
            <div class="numcolor">
        <span class="colorNum"><?php echo $this->number; ?></span>


            <span class="color" style="background-image: linear-gradient(to right, <?php for ($i = 0; $i < count( $this->color ); $i++) {?><?php echo $this->color[$i] . (($i != (count( $this->color ) - 1)) ? "," : "");} ?>);">
            </span>
                </div>
            <?php

    }


}

class Lettelor extends Numbelor {

}

$numcolors = array();
/*$numbers = array(( 8271055 ),
    ( 2203 ),
    ( 2103 ),
    ( 7994 ),
    "0963",
    ( 7136 ),
    ( 1362 ),
    ( 3622 ),
    ( 6220 ),
    ( 2203 ), 71362203, 28014400, 13805121,
    1017266936, 1036656982, 3206767632, 3116444446,
    3128697414, 3053519005, 3052481011, 380, 777, 747, 320 );*/
/*for ($j = 221; $j <= 222; $j++) {
    for ($i = 0; $i < 10000; $i++) {
        $numbers[] = str_pad($i, 4, "0", STR_PAD_LEFT) . $j;
    }
}*/

$numbers = array( "windows", "facebook", "sandra", "cristian", "jacob", "avianca", "hongkong", "feliza", "psl","monica", "ivanka trump", "zeus", "amazon", "color", "donald trump", "europa", "united states",
    "australia","computer","manzana", "tomate", "grow", "cristian david jimenez duarte", "napoleon bonaparte", "similar items", "empresa", "business", "gustavo", "loco", "mama","octopus","camaron","bill gates");

for ($i = 0; $i < count( $numbers ); $i++) {
    $new = new Numbelor();
    $new->setNumber( $numbers[$i] );
    array_push( $numcolors, $new );
}






?>
<html><head>
    <style type="text/css">

        .numcolor {
            display: block;
            width: auto;
            border-bottom: 1px solid #ccc;
            padding-top:3px;
            padding-bottom:3px;
        }
        .color, .colorNum {
            width:auto;
            height:23px;
            display:inline-block;
            margin:0;


        }

        .color {
            width:23px;
            border:1px solid #000;
        }
    </style></head><body>
<?php
for ($i = 0; $i < count( $numcolors ); $i++) {
    $numcolors[$i]->printNumberWithColor();
}

?>
</body></html>
<?php

exit;


class Digit {
    private $id;
    private $digit;
}

class Number {
    public $digitsLists;
}


function rotateNumber( $num, $rotationsLength )
{
    $rotations = array();
    for ($i = 0; $i < $len = strlen( $num ); $i++) {
        if (($len - $i) >= $rotationsLength)
            array_push( $rotations, substr( $num, $i, $rotationsLength ) );
    }
    return $rotations;
}

function reverseRotateNumber( $num, $rotationsLength )
{
    $finalNumber = strrev($num);
    $rotations = array();
    for ($i = 0; $i < $len = strlen( $finalNumber ); $i++) {
        if (($len - $i) >= $rotationsLength)
            array_push( $rotations, substr( $finalNumber, $i, $rotationsLength ) );
    }
    return $rotations;
}



$rotations = reverseRotateNumber( $num = "7136220310172669361036656982", 4 );
echo $num . "<br/>";
print_r( $rotations );

$rotations = reverseRotateNumber( $num = "7136220310172669361036656982", 6 );
echo $num . "<br/>";
print_r( $rotations );


$rotations = reverseRotateNumber( $num = "257113090050080040090035527900200900500018000415115", 6 );
echo $num . "<br/>";
print_r( $rotations );



$rotations = reverseRotateNumber( $num = "9405508205496366526809", 4 );
echo $num . "<br/>";
print_r( $rotations );

function numpad( $num, $maxFill )
{
    $leadingZeros = max( 0, $maxFill - strlen( $num ) );
    
    return str_repeat( "0", $leadingZeros ) . $num;

}


function sampling($chars, $size, $combinations = array()) {
    # in case of first iteration, the first set of combinations is the same as the set of characters
    if (empty($combinations)) {
        $combinations = $chars;
    }
    # size 1 indicates we are done
    if ($size == 1) {
        return $combinations;
    }
    # initialise array to put new values into it
    $new_combinations = array();
    # loop through the existing combinations and character set to create strings
    foreach ($combinations as $combination) {
        foreach ($chars as $char) {
            $new_combinations[] = $combination . $char;
        }
    }

    # call the same function again for the next iteration as well
    return sampling($chars, $size - 1, $new_combinations);

}


function combineUniqueDigits( $charsAsString, $size )
{
    
    $uniqueCombinations = array();
    $chars = array();
    for ($k = 0; $k < strlen( $charsAsString ); $k++) {
        $chars[] = $charsAsString[$k];
    }
    $result = sampling( $chars, $size );
    
    foreach ($result as $number) {
        $addNumber = true;
        $positions = array();
        for ($i = 0; $i < strlen( $charsAsString ); $i++) {
            $pos =  strpos( $number, $charsAsString[$i] );
            $positions[$pos] = $charsAsString[$i];
        }
        
        $addNumber = count( $positions ) == strlen( $charsAsString );
        if ($addNumber)
            $uniqueCombinations[] = $number;
    }
    return $uniqueCombinations;
}

function generateUniqueDigitsNumber( $maxDigits=10 )
{
    if ($maxDigits > 10) {
        echo "You can not set more than 10 digits for unique digits number.";
        exit;
    }

    $generated = array();
    
    for ($i = 0; $i < $maxDigits; $i++) {
        while (in_array( $randNumber = rand( 0, 9 ), $generated ));
        $generated[] = $randNumber;
    }
    
    return implode( "", $generated );   
}

$finalNumbers = array();
for ($i = 0; $i < 2; $i++) {
    $chars1 = generateUniqueDigitsNumber( 3 );
    $output1 = combineUniqueDigits($chars1, strlen( $chars1 ));
    $finalNumbers = array_merge( $finalNumbers, $output1 );
}

$finalNumbers = array_unique( $finalNumbers );

echo "Generated " . count( $finalNumbers ) . "<br/>";

print_r($finalNumbers);



define('max_lotteries',17);

class RandomNumber {
    public $number;
    public $maxNumber;
    public $setAsNumber;

    public function __construct( $maxNumber=999, $setAsNumber=false )
    {
        $this->maxNumber = $maxNumber;
        $this->setAsNumber = $setAsNumber;
        $this->generate();
    }

    public function generate()
    {
        if ($this->setAsNumber === false) {
            $this->number = numpad( rand( 0, $this->maxNumber ), strlen( $this->maxNumber ) );
        }
        else
            $this->number = $this->maxNumber;
    }

    public function print()
    {
        return $number;
    }

}

class ChanceNumber extends RandomNumber {
    public function __construct($maxNumber=999, $setAsNumber=false )
    {
        parent :: __construct($maxNumber, $setAsNumber );
    }
}

class LotteryNumber {
    public $number;
    public $serial;

    public function __construct()
    {
        $this->number = new RandomNumber(999);
        $this->serial = new RandomNumber(0);
    }
    
    public function print()
    {
        return  "<span class='lottnum'>{$this->number->number}-{$this->serial->number}</span>";
    }
}

class LotteryPlayer {
    public $name;
    public $numbersList;

    public function __construct( $maxNumbers=null )
    {
        $setCustomNumbers = false;
        if (is_array( $maxNumbers )) {
            echo "Must set custom numbers!"; 
            $setCustomNumbers = true;
        }
        
        $this->numbersList = array();
        
        for ($i = 0; $i < ($setCustomNumbers ? count( $maxNumbers ) : $maxNumbers ); $i++) {
            $newNumber = new LotteryNumber();
            if ($setCustomNumbers)
                $newNumber->number = new RandomNumber( $maxNumbers[$i], true );
            
            $this->numbersList[$newNumber->number->number . '-' . $newNumber->serial->number] = $newNumber;
        }

    }
    
    public function addNumber( $newNumber )
    {
        $this->numbersList[$newNumber->number->number . '-' . $newNumber->serial->number] = $newNumber;
    }

    public function print()
    {
        $output = "";
        foreach ($this->numbersList as $number) { 
            $output .= $number->print();
        }
        return $output;
    }
    
    public function getAllCombinations( $number )
    {
        for ($i = 0; $i < 4*3*2*1; $i++) {
            
        }
    }
    
    public function findCombined( $number )
    {
        $numDigits = $number->number;
        
        foreach ($this->numbersList as $n) {
            
        }
    }

    public function findNumber( $number )
    {
        $key = $number->number->number . "-" . $number->serial->number;
        if (isset( $this->numbersList[$key]) ) {
            
            
            $match = $this->numbersList[$number->number->number . "-" . $number->serial->number];
            if ($match != null) {
                return $match;
            }
        }
    }
}

class LotteryMatches extends LotteryPlayer {
    public function hasMatches()
    {
        return count( $this->numbersList ) > 0;
    }
}

class Lottery extends LotteryPlayer {

    public function doMatch( LotteryPlayer $player )
    {
        $lotteryMatches = new LotteryMatches();
        foreach ($player->numbersList as $number )
        {
            $match = $this->findNumber( $number );
            if ($match != null) {
                $lotteryMatches->addNumber( $match );
            }
        }
        if ($lotteryMatches->hasMatches())
            return $lotteryMatches;
        return null;
    }
}


class BethHouse {
    public $lotteries;
    
    public function __construct( $maxLotteries )
    {
        $this->lotteries = array();
        for ($i = 0; $i < $maxLotteries; $i++) {
            $l = new Lottery(1);
            $l->name = "Lottery " . $i;
            array_push( $this->lotteries, $l );
        }
    }
    
    public function play( LotteryPlayer $lotteryPlayer )
    {
        foreach ($this->lotteries as $lottery) {
            $result = $lottery->doMatch( $lotteryPlayer );   
            if ($result != null) {
                echo "Player " . $lotteryPlayer->name . " wins " . $lottery->name . " with the number " . $result->print() . "<br/>";
            }
        }
    }
    
    public function print()
    {
        echo "<div class='lotteryList'>";
        foreach ($this->lotteries as $lottery) {
           echo "<div class='lottery'>";
           echo "<strong>" . $lottery->name . "</strong>";
           echo $lottery->print();
           echo "</div>";
        }
    }
    
}

 





?>


<html>
<head>
    <style type="text/css">
        .lottnum {
            border: 1px solid green;
            padding: 5px;

            margin-right:5px;
            margin-bottom:3px;
            display:inline-block;
            width: auto;
            color:green;
        }
    </style>
</head>
<body>
<?php 
$lotteryPlayer = new LotteryPlayer( array_merge( $output1, $finalNumbers ) );
$lotteryPlayer->name = "Cristian";
//echo $lotteryPlayer->print();
$bethHouse = new BethHouse(12);


?>
<table width="100%" border="3">
<tr>
<td valign="top" width="50%"><?php $bethHouse->print(); ?></td>
<td valign="top"><?php $bethHouse->play( $lotteryPlayer ); ?></td>
</tr></table>
<?php 



//$bethHouse->play( $lotteryPlayer );
/*
?>
    
<h1>Loteria de Medellin, ganadores</h1>
<?php
    $lotteryPlayer = new LotteryPlayer(1);
    $lottery = new Lottery(38);
    $lottery->print();
    
    $lotteryMatches = $lottery->doMatch( $lotteryPlayer );
    if ($lotteryMatches != null)


?>
        
<h2>Matches</h2>
<?php



/*    echo "Total numbers playing: " . count( $lotteryPlayer->numbersList ) . "<br/>";
    $lotteryMatches = $lottery->doMatch( $lotteryPlayer );
    echo "Total matches: " . count( $lotteryMatches->numbersList ) . "<br/>"; 
    $lotteryMatches->print();*/
    
    /*
    
?>
    
<h2>Jugador 1</h2>
<?php

    $lotteryPlayer->print();*/
?>

</body>
</html>
