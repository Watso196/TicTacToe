<!doctype html>
<html>
<head>
  <meta charset="utf-8">
    <title>Tic-Tac-Toe Game</title>
 	<?php
	echo $this->Html->css('tictactoe_homepage_style');
	?>
</head>
<body>
  <header>
	  <h1>
          <a>
              Welcome to our Tic-Tac-Toe game!
          </a>
      </h1>
  </header>
  
  <p>
    The game involves two players, X and O, who take turns marking the spaces in a 3×3 grid. The player who succeeds in placing three of their marks in a horizontal, vertical, or diagonal row wins the game. Enter a username in each field below then click Start Game. Player X will go first.
  </p>
    
  <?php echo $this->Form->create(null); ?>
	<?= $this->Form->input('username_one', ['label' => 'Player X Username']); ?>
	<?= $this->Form->input('username_two', ['label' => 'Player Y Username']); ?>
	<?= $this->Form->postButton('Start Game', ['controller' => 'users', 'action' => 'add']); ?>
  </form>
    
  <div class="footer">
  
      <footer>
          <p>Copyright &copy; Kalib Watson, Ross Klimoski, Stephanie Walker.</p>
      </footer>
      
  </div>

</body>
</html>
