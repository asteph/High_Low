<?php 
//user guesses a number between 1 and 100
//tells if higher or lower and when correct

//generates random number and displays range for guess
//calls guess() with randomNumber passed to it
function playGame(){
	$randomNumber = rand(1, 100);
	fwrite(STDOUT, "Guess a number between 1 and 100.\n");
	guess($randomNumber);
}
//asks for guess and compares to the random number that was 
//passed to it and then calls response with
//the parameters of the random number and the user number
function guess($randomNumber){
	fwrite(STDOUT, 'Guess? ');
	$userNumber = fgets(STDIN);
	response($randomNumber, $userNumber);
}
//compares guess to number and responds with higher or lower
//if guess is correct, asks if user wants to play again
function response($randomNumber, $userNumber){
		if($randomNumber < $userNumber){
			fwrite(STDOUT, "LOWER\n");
			guess($randomNumber);
		}else if($randomNumber > $userNumber){
			fwrite(STDOUT, "HIGHER\n");
			guess($randomNumber);
		}
		else{
			fwrite(STDOUT, "GOOD GUESS!\n");
			//check to see if user wants to play again
			fwrite(STDOUT, 'Play Again? (y/n): ');
			//trim removes the enter key and spaces
			$playAgain = trim(fgets(STDIN));
			if($playAgain == 'y'){
				//reset the game
				playGame();
			}
		}
	}
//run game
playGame();
?>