<!DOCTYPE HTML>
<html>
<head>
  <?= $this->Html->css('gamepage'); ?>
  <?php
     $url = $this->request->here;

     $params = explode("/", $url);
  ?>
  <title> Tic Tac Toe Game Page </title>
</head>
<body>
  <h1> Tic Tac Toe</h1>

  <ul id="game">
        <!-- first row -->
        <li data-pos="0,0"></li>
        <li data-pos="0,1"></li>
        <li data-pos="0,2"></li>
        <!-- second row -->
        <li data-pos="1,0"></li>
        <li data-pos="1,1"></li>
        <li data-pos="1,2"></li>
        <!-- third row -->
        <li data-pos="2,0"></li>
  	<li data-pos="2,1"></li> 
  	<li data-pos="2,2"></li>
  </ul>
  

  <div id="game-messages">
        <span class="player-x-win"><p><?= $params[5]; ?> Wins!</p></span>
        <span class="player-o-win"><p><?= $params[6]; ?> Wins!</p></span>
  	<span class="draw"><p>Draw Game</p></span>
  </div>

  <div class="user">
  	<p>
	    Player X: <?= $params[5]; ?>
  	</p>
  	<p>
	    Player Y: <?= $params[6]; ?>
  	</p>
  </div>

  <?= $this->Form->create($game); ?>
	<?= $this->Form->input('form'); ?>
	<?= $this->Form->postButton('Reset', ['controller' => 'games', 'action' => 'add', $params[5], $params[6]]); ?>
	<?= $this->Form->postButton('Quit', ['controller' => 'games', 'action' => 'add']); ?>

  </form>

<footer>
  <p>Copyright &copy; AL 491 Group 4: Stephanie Walker, Ross Klimoski, and Kalib Watson.</p>
</footer>

<?= $this->Html->script('game'); ?>

</body>

</html>

