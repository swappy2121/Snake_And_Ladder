<?php
    class SankeAndLadder{
        //variable
        public $Start_Position = 0;
        private $diceNum;
        private $count = 0;
        public $positionOfPlayer1 = 0;
        public $positionOfPlayer2 = 0;
        public $previousPosition1;
        public $previousPosition2;
        private $flag = true;

        //welcome message
        public function welcomeWindow(){
            echo "Welcome to the Snake And Ladder game \n";
            echo "Player starts from $this->Start_Position \n";
        }

        //function of rolling the dice 
        public function rollDice(){
            $this->diceNum = rand(1, 6);
            $this->count++;
            echo "Number of times dice rolled : $this->count  \n";
        
            return $this->diceNum;
        }

        //function for option check
        public function optionCheck(){
            return rand(1, 3);
        }

         
        
        public function nextMove($choice){   
            $this->previousPosition1 = $this->positionOfPlayer1;
            $this->previousPosition2 = $this->positionOfPlayer2;
            
                switch($choice){
                    case 1:
                        if($this->flag == true){
                            $this->positionOfPlayer1 = $this->positionOfPlayer1;
                            echo " Previous Position of player1 :  $this->previousPosition1      Start position of player1 :  $this->positionOfPlayer1 \n";
                            $this->flag = false;
                        }
                        else{
                            $this->positionOfPlayer2 = $this->positionOfPlayer2;
                            echo "Previous Position of player2 :  $this->previousPosition2      Start position of player2 :  $this->positionOfPlayer2   \n";
                            $this->flag = true;
                        }
                        break;
    
                    case 2:
                        if($this->flag == true){
                            $this->positionOfPlayer1 += $this->diceNum;
                       
                            if($this->positionOfPlayer1 < 100){
                                echo "Previous Position of player1 :   $this->previousPosition1      Start Position of player1 :  $this->positionOfPlayer1  \n";
                            }
                            elseif($this->positionOfPlayer1 > 100){
                                $this->positionOfPlayer1 = $this->previousPosition1;
                                echo "Previous Position of player1 :  $this->previousPosition1        Start Position of player1 :   $this->positionOfPlayer1   \n";
                            }
                            elseif($this->positionOfPlayer1 == 100){
                                echo "Previous Position of player1 :  $this->previousPosition1        StartPosition of player1 :   $this->positionOfPlayer1  \n";
                                echo "Player1 won the game";
                                break;
                            }
                            $this->diceNum = $this->rollDice();
                            $choice = $this->optionCheck();
                            $this->nextMove($choice);
                            $this->flag = false;
                        }
                        else{
                            $this->positionOfPlayer2 += $this->diceNum;
                            
                            if($this->positionOfPlayer2 < 100){
                                echo "Previous Position of player2 :  $this->previousPosition2     Start Position of player2 :  $this->positionOfPlayer2   \n";
                            }
                            elseif($this->positionOfPlayer2 > 100){
                                $this->positionOfPlayer2 = $this->previousPosition2;
                                echo "Previous Position of player2 :  $this->previousPosition2      Start Position of player2 :  $this->positionOfPlayer2   \n";
                            }
                            elseif($this->positionOfPlayer2 == 100){
                                echo "Previous Position of player2 :  $this->previousPosition2      Start Position of player2 :  $this->positionOfPlayer2   \n";
                                echo "Player2 won the game";
                                break;
                            }
                            $this->diceNum = $this->rollDice();
                            $choice = $this->optionCheck();
                            $this->nextMove($choice);
                            $this->flag = true;
                        }  
                        break;
    
                    case 3:
                        if($this->flag == true){
                            $this->positionOfPlayer1 -= $this->diceNum;
                            if($this->positionOfPlayer1 < 0){
                                $this->positionOfPlayer1 = 0;
                            }
                            echo "Previous Position of player1 :  $this->previousPosition1       Start Position of player1 :  $this->positionOfPlayer1   \n";
                            $this->flag = false;
                        }
                        else{
                            $this->positionOfPlayer2 -= $this->diceNum;
                            if($this->positionOfPlayer2 < 0){
                                $this->positionOfPlayer2 = 0;
                            }
                            echo "Previous Position of player2 :  $this->previousPosition2      Start Position of player2 :  $this->positionOfPlayer2  \n";
                            $this->flag = true;
                        }    
                        break;
                }
            
            } 
        
    }

    
    $Game_Operation = new SankeAndLadder();
    $Game_Operation->welcomeWindow();
    while($Game_Operation->positionOfPlayer1 < 100 && $Game_Operation->positionOfPlayer2 < 100){
        $Game_Operation->rollDice();
        $choice = $Game_Operation->optionCheck();
        $Game_Operation->nextMove($choice);
    }  
?>