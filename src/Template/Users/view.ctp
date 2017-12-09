
<!-- File: src/Template/Users/view.ctp -->

<h1>User Rankings</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Games Won</th>
        <th>Games Played</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td>
           <p><?= $user->username ?></p>
        </td>
        <td>
           <p> <?= $user->games_won ?></p>
        </td>
        <td>
           <p> <?= $user->games_played ?></p>
        </td>
    </tr>
    <?php endforeach; ?>
