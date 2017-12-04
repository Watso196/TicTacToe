
<!DOCTYPE HTML>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="gamepage.css"/>
<title> Tic Tac Toe Game Page </title>
</head>
<body>
  <!-- Navigation -->
  <nav>
  <ul class="list-nav">
      <li><a href="home.ctp">Home</a></li>
      <div class="button">
      <button type="button">Click here for the Rules</button>
    </div>

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
        <span class="player-x-win">Player One Wins</span>
        <span class="player-o-win">Player Two Wins</span>
  	<span class="draw">Draw Game</span>
  </div>

  <div class="user">
  <p> form/user X here </p>
  <p> form/ user O here </p>
</div>
    <div class="whoseturn">
  <p> form/ whose turn it is </p>
</div>

<footer>
  <p>Copyright &copy; AL 491 Group 4: Stephanie Walker, Ross Klimoski, and Kalib Watson.</p>
</footer>

</body>

</html>

