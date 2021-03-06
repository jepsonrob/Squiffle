<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Squiffle!">
    <meta name="author" content="Rob Jepson">

    <title>Squiffle!</title>


	<script src="jQuery.js" type="text/javascript"></script> 
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
	body {
		text-align: center;
	}
	
	#rules ul {
		list-style-type: none;
		padding:none;
		
	}
	
	#rules li {
		padding:none;
		position:relative;
	}
	
	#rules {
		font-size:7px;
		text-align:left;
		padding-left:50px;
		
	}
	
	button {
		margin:5px;
	}
	</style>
<html>
<body>
	<br>
	<h1> SQUIFFLE: THE (very real) GAME! </h2>
	<hr>
	<br><br>
	<form>
	  <h5>Please put the total value of the cards. Or make up a number - you're the Game Master!</h5> 
	  <input type="text" name="totalCards" value=" " oninput="cardSelect(value)" ><br>
	</form>
	
	
	<div id='roundDiv'> </div>
	

	<hr>
	
	<div class='col-lg-offset-3 col-lg-6'>
		<h3> Some rare exceptions to chose from! </h3>
	<button onclick='differentCase(0);'>Multiple Aces</button>
	<button onclick='differentCase(1);'>King, Queen & Jack!</button>
	<button onclick='differentCase(2);'>Two Kings</button>
	<button onclick='differentCase(3);'>One Ace, no other cards</button>
	<button onclick='differentCase(4);'>One King, no other cards</button>
	<button onclick='differentCase(5);'>One Queen, no other cards</button>
	<button onclick='differentCase(6);'>One Jack, no other cards</button>
	<button onclick='differentCase(7);'>King (with other number cards)</button>
	<button onclick='differentCase(8);'>Queen (with other number cards)</button>
	<button onclick='differentCase(9);'>Lower number than there are players?!</button>
	<button onclick='differentCase(10);'>No cards?</button>
	<button onclick='differentCase(11);'>No cards again?!</button>
</div>
	

	<br><br><br><br><br><br><br><br><br><br>
	<div id='rules'><p>
	<h5> Some rules </h5>
		<ul>
			<li>PLAYERS: 3 or more</li>
		<li>Each player gets 3 cards and has a piece of paper for notes</li>
		<li>Every player either plays one card from their hand or gives a card away unless they cannot play.</li>
		<li>these cards decide on the 'round' played.</li>
		<li>Cards after a round are usually discarded.</li>
		<li>Rounds can do quite a lot of things. Lots of things. This heavily effects the nature of the game. All rounds are disarmingly confusing and abstract.</li>
		<li>The screen is for the Game Master only, as it details the flow of the game allowing for his/her improvisation as neccesary</li>
		<li>After each round, players either get another card or drink (or other things, stipulated in round rules)</li>
		<li> Don't you dare look at my soup, you piece of shit. </li>
	</p>
	</div>
	
</body>
<script>
	
	
	
	/* SQUIFFLE: THE (very real) GAME!
	
	PLAYERS: 3 or more
		- each player will have to be a document thing added accordingly... this may pose a problem, but hopefully won't!
	
	- Each player gets 3 cards and has a piece of paper for notes
	- Every player either plays one card from their hand or gives a card away unless they cannot play.
	- these cards decide on the 'round' played.
	- Cards after a round are usually discarded.
	- Rounds decided by adding numbers and using a modulo, using the face cards for added decision factors
	- Rounds can do quite a lot of things. Lots of things. This heavily effects the nature of the game. All rounds must be disarmingly confusing and abstract.
	- The screen is for the Game Master only, as it details the flow of the game allowing for his/her improvisation as neccesary
	- After each round, players either get another card or drink (or other things, stipulated in round rules)
	
	ROUNDS:
	
	Special Cases:
	
	Multiple aces;
	K, Q, J;
	2 Kings 
	One ace, no other cards
	One King, no other cards
	One Queen, no other cards
	One Jack, no other cards
	King with other cards
	Queen with other cards
	Lower number than number of players
	No cards?
	No cards again?!
	
	or 
	
	total of cards % total rounds
	
	

	
*/
	
	var exceptionRounds = [
	

	"<h2>Bombs of Destiny / Explode all over my face</h2> <p>A timer is set in seconds by the number of cards that are not aces, multiplied by 3 plus 60. Each player needs to hold an ace in their mouth at all times. 	One ace is a bomb, the others just cards, why are they holding them in their mouths? That's disgusting. People that did that drink, person bombed needs to drink lots. Take the aces out of the deck.</p>",
	

	"<h2>RPG</h2><p>Say nothing. Play that roleplaying game with cards with the person that first breaks the silence. If multiple people break the silence, pick a number tie break. Make sure to end on a cliffhanger!</p>",
	
	"<h2>Who shall lead?</h2><p>Everyone decides on a leader. To address the leader people have to salute vigorously and begin every sentence addressed to them as 'oh glorious one of such power,'. The leader is also burdened by recieving all the drinks everyone has and deciding who gets what, if he/she wants to. They can elect people to do tasks and such. </p><p>(Play a fake round, then...) Violent revolt! The leader has to finish all the drinks he has kept and must refresh all new ones a new leader must be decided on to worship.</p><p>(Play another fake round, then...) Does history repeat itself? Electing leaders has got everyone nowhere, so now it's communism. Pour all drinks into a jug and pour everyone equal measures.</p>",
	
	
	"<h2>Super cool loner guy</h2><p>the person that played the ace needs to turn around and be particularly aloof about things.</p>",
	
	"<h2>A kingdom! A kingdom! My horse for a kingdom!</h2> <p>The person that played the only king is now gamemaster!</p>",
	
	
	"<h2>Drama Queen!</h2> <p>Whenever the person that layed the queen has to drink, they must now scream beforehand.</p>",
	
	
	"<h2>Long live the King!</h2><p>You are now the king! You get to make up some rules!</p>",

	"<h2> Fake JackSnap! </h2> <p> JackSnap is for pussies, so everybody make up some rules to make JackSnap much better. </p>",
	
	"<h2> Rasputin </h2><p>The king now hates you because you layed the queen you piece of shit. Everyone pretend to throw poo at this person. </p>",
	
	
	"<h2>Jack of all... tables?</h2><p>the jack layer needs to get under the table for an arbitrary amount of time.</p>",
	
	
	"<h2> Hold me </h2><p>everyone holds hands and the gamemaster plays for everyone as a proxy. Any face card being played stops this.</p>",
	
	
	"<h2>No cards!</h2><p>No one played a card? Tell them that we're starting a game of snap, and that it goes around and everyone lays a card. Then start a round. They don't control me!</p>",
	
	"<h2>No cards again?!</h2><p>If it happens a second time, actually play snap. It's likely they'll all just run out of cards, in which case the game is over and everyone must go home. If they actually do manage to win at snap then everybody drinks lots and the game is reset, except with the most timid person now as gamemaster.</p>"
		
	]
	
	var numberRounds = [
		
		"<h2> Everyone is on fire! </h2> <p>OH GOD EVERYTHING IS BBURNOING!!! AHHHHH! (anyone that tries to put out the fire needs to drink!)</p>",
		
		"<h2> Meta Squiffle </h2> <p>Play wish smaller cards, but make it seem like a game-within-a-game!</p>",
		
		"<h2> Oh no! Someone is diseased! </h2> The gamemaster gets everyone to close their eyes, and taps a random person - that person is now diseased! Everyone needs to hold hand with the people they think are not diseased. Everyone then closes their eyes and drinks, whilst the gamemaster taps those with the disease. Everyone opens their eyes and then repeats. When everyone is infected, everyone drinks. (As gamemaster you have the choice of tapping random people and causing chaos!)</p>",
		
		"<h2> What's the time?! </h2> <p> Pretend to be a clock with hands, making a time. Don't tell anyone you're a clock. Ask them 'What's the time?!' very aggressively. When someone actually describes what time is, then great! You now know time! Drink your time away! </p> <p> If enough time passes and no one tells you what time is, everyone drink and communicate only in tick-tocks.</p>",
		
		"<h2> Hats! </h2> What even are hats? Man, I have no idea. Get everyone to figure out the closest thing to a hat without it actually being a hat. The person to wear a shoe on their head win's the shoe clue and has to drink. When the shoe clue is used, that person gets to take off their shoes! If no one puts a shoe on their head, everyone drinks.</p>",
		
		"<h2> Stabby stabby! </h2> <p> Select a person to grab some fruit and stab it. If they are too timid go to the next person, when someone has finally stabbed the fruit in a murderous enough way then they win! Everyone else must drink in fear.",
		
		"<h2> Handles! </h2> <p> Everyone needs to look at a handle. The last person to look at a handle has to discuss ham until they inevitably run out of ham based ideas and have to drink to deal with that. </p>",
	
		"<h2>Wholesome Social</h2> <p> Everyone opens their most commonly used social media site on their phone and passes it to the player on their left. Everyone then writes the nicest thing they can. Anyone  </p>",
	
		"<h2> Blackjack!</h2> <p>Everybody plays blackjack, but it's now 13 to bust. Don't tell anyone. People that lose drink.</p>",
	
		"<h2> Guess What I am! </h2><p> Say 'Guess what I am!' and obviously be a lion. The third person to say lion wins! Everyone else drinks!</p>",
	
		"<h2>This one will take a while</h2><p>Intricately arrange the cards, make sure it takes a while and uses a lot of the deck. Then just flip a coin and if heads everyone drinks.</p>",
	
		"<h2>Stander upper.</h2> <p>The person to play the highest card has to stand and sit whenever they are told. If they don't, they are OUT OF THE GAME. You must take one drink to tell the stander upper to stand/sit.</p>",
	
		"<h2>Imposter! </h2><p>Someone is an imposter! The game master goes round everyone telling them that they are NOT the imposter. They are told that if they catch the real imposter, the imposter has to finish their drink and wear their socks on their head. If anyone says that they are the imposter, they must do exactly that.</p>",
	
		"<h2>Who can think of that thing?</h2> <p>Ask everyone 'What's that thing?' until a satisfactory answer appears. Write it down in big letters and tear each letter apart. Give a letter to players at random, and say' I think you know what to do now!' Nothing they do is correct.</p>",
	
		"<h2>Trouble in paradise</h2><p>Get everyone to do that silly alphabet game with any words to buy time. On a piece of paper write 'you are to destroy the tower at all costs.' Tower of cards! Players need to try and make a tower of cards in 1 minute. Except for that one person. If there is no kind of tower at the end of the timer, everyone other than the bad person drinks! If there is, they have to finish their drink.</p>",
	
		"<h2> Taking score!</h2><p>POINTS ARE NOW ACTIVE! Players need to write down the values of the cards they play and deal with the gamemaster randomly throwing point changes at them according to his whim. If there is a leader, they are the main giver & taker away of points.</p>",
	
		"<h2>Nothing at all</h2><p>Secretly write 'don't say anything at all about this note' on a note and give it to the lowest card player. If they don't say anything in 4 rounds, everyone else needs to take a drink. If they do say something though, they need to finish.</p>",
	
		"<h2>Shoes on the table! </h2><p>Everyone puts a shoe on the table, and takes one they like the look of. They must then put their cups into the shoes and drink exclusivly from them.</p>",
	
		"<h2>The Bufallo of Darlington Station</h2><p>Arrange the cards accordingly. Get everyone to play rock paper scissors as quickly as possible to buy time. When done arranging the cards, turn them upside down and tell everyone to stop playing rock paper scissors. Get everyone to pick a card. Points are allocated according to number of people playing: highest card gets no points, lowest gets most. Second higest gets sendond highest points, then second lowest, etc. Points are then turned into drinks.</p>",
		
		"<h2>The fickle truth of pidgeons</h2>	<p>Everybody needs to start cawing like a bird. The first & last person cawing drinks. Don't tell them that.</p>",
	
		"<h2>Rapist's delight</h2><p>	Get everyone to touch their cards sexually. Now swap them all. People that look a bit rapey need to drink, too. The women collectively need to decide on that.</p>",
	
		"<h2>Charades!</h2><p>Everyone just play charades, but only facial movements are allowed. Every time someone gets it wrong, they need to drink. Have a jolly good time. </p>",
	
		"<h2>Rock paper scissors entanglement</h2><p>Everyone plays rock paper scissors but with two hands. The winner chooses who has to drink and then the person to their left & right drinks</p>",
	
		"<h2>Sock swap.</h2><p>Yep. Just make everyone swap socks.</p>",
	
		"<h2>Spoons!</h2><p>Everyone go get a spoon, this will be used later! (it won't)</p>",
	
		"<h2>Shopping list</h2><p>Make everyone come up with a shopping list to a budget, whilst having a merry drink about it.</p>",
	
		"<h2>Gross Karma</h2><p>Get everyone to say a number. Closest to total of cards minus 5 gets to pick a person! The person they pick has to eat whatever food they chose. When they have chosen the food explain to them that they will actually have to eat it themselves or leave the game. Sorry.</p>",
	
		"<h2>Slap yourselves in the face!</h2><p> Read the title, and if anyone actually slaps themselves in the face they need to drink. That's just the title of the round you idiot, not an instruction!</p>",
	
		"<h2>Balancing act.</h2><p>Hold your card on your finger for as long as possible. Regardless of who lasts the longest, the 2 highest value cards need to drink.</p>",
	
		"<h2>Delicious bodily fluid!</h2><p>Everyone spits in a cup, then a vote is made. The person voted for needs to wash the cup because it's gross. Everyone that voted for that person drinks. </p>"
	
		]
		
	
		function cardSelect(cards){
			if (cards===""){
				document.getElementById('roundDiv').innerHTML = "<h2>Ah, I see we're in the space between rounds!</h2>";
			} else{
			var totalRounds = numberRounds.length;
			var text = numberRounds[cards % totalRounds];
			console.log(numberRounds[cards]);
			document.getElementById('roundDiv').innerHTML = text;
		}
			/*} else {
			document.getElementById('roundDiv').innerHTML = "<h1> The Game Master Sucks </h1><p> Don't put anything but numbers in my box you piece of shit.</p>";
		}*/
		}
		
		function differentCase(num){
			text = exceptionRounds[num];
			document.getElementById('roundDiv').innerHTML = text;
		}
		
		console.log(numberRounds.length + exceptionRounds.length)
	
	
</script>
	
</html>
