<!DOCTYPE HTML>
<html>
<head>
  <?= $this->Html->css('gamepage'); ?>
  <?php
     use Cake\Datasource\ConnectionManager;

     use Cake\ORM\TableRegistry;

     $url = $this->request->here;

     $params = explode("/", $url);

     $connection = ConnectionManager::get('default');
     $users = $connection
        ->newQuery()
        ->select('*')
        ->from('users')
        ->execute()
        ->fetchAll('assoc');
     
     foreach ($users as $user) {
        if ($user['username'] == $params[5]) {
                $user_1_won = $user['games_won'];
        }
	elseif ($user['username'] == $params[6]) {
                $user_2_won = $user['games_won'];
        }
     }          
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
	    Player X: <?= $params[5]; ?> | 
	    Games Won: <?= $user_1_won; ?> 
	</p>
  	<p>
	    Player Y: <?= $params[6]; ?> | 
            Games Won: <?= $user_2_won; ?>
	</p>
  </div>

  <?= $this->Form->create($game); ?>
	<?= $this->Form->input('form'); ?>
	<?= $this->Form->postButton('Reset', ['controller' => 'games', 'action' => 'add', $params[5], $params[6]]); ?>

  </form>

<footer>
  <p>Copyright &copy; AL 491 Group 4: Stephanie Walker, Ross Klimoski, and Kalib Watson.</p>
</footer>

<?= $this->Html->script('game'); ?>

</body>

</html>

