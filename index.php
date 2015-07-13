<?php 
//user guesses a number between 1 and 100
//tells if higher or lower and when correct

//generates random number and displays range for guess
//calls guess() with randomNumber passed to it
if ($argc == 1){
	fwrite(STDOUT, "Enter min value: \n");
	$min = (int)fgets(STDIN);
	fwrite(STDOUT, "Enter max value: \n");
	$max = (int)fgets(STDIN);
}else{
	$min = (int)$argv[1];
	$max = (int)$argv[2];	
}
function playGame($min, $max){
	$randomNumber = mt_rand($min, $max);
	fwrite(STDOUT, "Guess a number between 1 and 100.\n");
	//keeps track of user guesses
	$guessNumber = 0;
	guess($randomNumber, $guessNumber, $min, $max);
}
//asks for guess and compares to the random number that was 
//passed to it and then calls response with
//the parameters of the random number and the user number
function guess($randomNumber, $guessNumber, $min, $max){
	fwrite(STDOUT, 'Guess? ');
	$userNumber = fgets(STDIN);
	$guessNumber++;
	response($min, $max, $randomNumber, $userNumber, $guessNumber);
}
//compares guess to number and responds with higher or lower
//if guess is correct, asks if user wants to play again
function response($min, $max, $randomNumber, $userNumber, $guessNumber){
		if($randomNumber < $userNumber){
			fwrite(STDOUT, "LOWER\n");
			guess($randomNumber, $guessNumber, $min, $max);
		}else if($randomNumber > $userNumber){
			fwrite(STDOUT, "HIGHER\n");
			guess($randomNumber, $guessNumber, $min, $max);
		}
		else{
			fwrite(STDOUT, "GOOD GUESS!\n");
			fwrite(STDOUT, "You guessed the number in {$guessNumber} guesses.\n");
			//check to see if user wants to play again
			fwrite(STDOUT, 'Play Again? (y/n): ');
			//trim removes the enter key and spaces
			$playAgain = trim(fgets(STDIN));
			if($playAgain == 'y'){
				//reset the game
				playGame($min, $max);
			}
		}
	}
//run game
playGame($min, $max);
?>