<?php

class  SnakeAndLadder {

  public $start_Position = 0;
public function welcomeWindow(){
         
        echo "Welcome to snake and ladder game \n";
        echo "Player will start from zeroth position.";
    }
}

$Game_Operation = new SnakeAndLadder();
$Game_Operation->welcomeWindow();

?>