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
  <!-- Navigation -->
  <nav>
  <ul class="list-nav">
      <button type="button">Click here for the Rules</button>

  </ul>
  </nav>
<!--End Navigation-->
  <h2> Tic Tac Toe</h2>

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
        <span class="player-x-win"><p>Player One Wins!</p></span>
        <span class="player-o-win"><p>Player Two Wins!</p></span>
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

<footer>
  <p>Copyright &copy; AL 491 Group 4: Stephanie Walker, Ross Klimoski, and Kalib Watson.</p>
</footer>

<?= $this->Html->script('game'); ?>

</body>

</html>

