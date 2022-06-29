<?php
class  SnakeAndLadder {

    public $Start_Position = 0;

    public function rollingTheDice(){

      $NumOnDice = rand(1, 6);
      echo "number on dice is $NumOnDice";
  }

  
  }
  
  $Game_Operation = new SnakeAndLadder();
  $Game_Operation->rollingTheDice();


?>