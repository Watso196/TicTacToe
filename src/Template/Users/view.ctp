
<!-- File: src/Template/Users/view.ctp -->

<head>

  <?php
     use Cake\Datasource\ConnectionManager;     

     $connection = ConnectionManager::get('default');

     $users = $connection
            ->newQuery()
            ->select('*')
            ->from('users')
            ->order(['games_won' => 'DESC'])
            ->execute()
            ->fetchAll('assoc');
  ?>

</head>

<h1>User Rankings</h1>
<table>
    <tr>
        <th>Username</th>
        <th>Games Won</th>
        <th>Games Played</th>
    </tr>

    <!-- Here is where we iterate through our $users query object, printing out article info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td>
           <p><?= $user['username']; ?></p>
        </td>
        <td>
           <p> <?= $user['games_won']; ?></p>
        </td>
        <td>
           <p> <?= $user['games_played']; ?></p>
        </td>
    </tr>
    <?php endforeach; ?>
