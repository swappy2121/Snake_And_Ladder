<?php
    class SnakeAndLadder{
        private $Start_Position = 0;
        private $Previous_Position;
        private $count = 0;
        private $diceNum;

        // welcome messege
        public function welcomeWindow(){
            echo "Welcome to the Snake And Ladder game \n";
            echo "Player starts from 0th position \n";
        }
      
        // rolling the dice
        public function rollDice(){
            $this->diceNum = rand(1, 6);
            $this->count++;
            echo "Number of times dice rolled : $this->count ". " "; 
            return $this->diceNum;
        }
       
    //    for checking options
        public function optionCheck(){
            
            return rand(1,3);
        }



        public function nextMove($numOnDie){  
            $choice = $this->optionCheck();
            $this->Previous_Position = $this->Start_Position;
            switch($choice){

                case 1:
                    
                    $this->Previous_Position = $this->Start_Position;
                    echo "there is a no play , player is in same position \n ";
                    echo "Previous Position : $this->Previous_Position    StartPosition : $this->Start_Position";
                    break;
                case 2:
            
                    $this->Start_Position += $numOnDie;
                    echo "player is moving forward \n";
                    echo "Previous Position : $this->Previous_Position   StartPosition :  $this->Start_Position";
                    break;
                case 3:

                    $this->Start_Position -= $numOnDie;
                    echo "player is bitten by snake \n";
                    echo "Previous Position : $this->Previous_Position    StartPosition : $this->Start_Position";
                    break;
            }
        }
    }

    
    $Game_Operation = new SnakeAndLadder();
    $Game_Operation->welcomeWindow();
    $numOnDie = $Game_Operation->rollDice();
    $Game_Operation->nextMove($numOnDie);

    ?>