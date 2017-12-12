<?php
// src/Controller/GamesController.php

namespace App\Controller;

use Cake\I18n\Time;

use Cake\Datasource\ConnectionManager;

use Cake\ORM\TableRegistry;

class GamesController extends AppController
{
  	public function add() {

	$gamesTable = TableRegistry::get('Games');

	$users = TableRegistry::get('Users');

	$player = $this->request->getData('form');

	$game = $gamesTable->newEntity();

	$url = $this->request->here;

        $params = explode("/", $url);

	$username1 = $params[5];
	$username2 = $params[6];

	$connection = ConnectionManager::get('default');
	$users = $connection
    	->newQuery()
    	->select('*')
    	->from('users')
    	->execute()
   	->fetchAll('assoc');

	foreach ($users as $user) {
		if ($user['username'] == $username1) {
			$player_1_id = $user['id'];
			$player_1_games_won = $user['games_won'];
			$player_1_games_played = $user['games_played'];
		}
		elseif ($user['username'] == $username2) {
			$player_2_id = $user['id'];
                        $player_2_games_won = $user['games_won'];
                        $player_2_games_played = $user['games_played'];
		}
	}

	if ($player == 'x') {
		$winner = $player_1_id;
		$player_1_games_won += 1;
		$player_1_games_played += 1;
		$player_2_games_played += 1;
	} else {
		$winner = $player_2_id;
		$player_2_games_won += 1;
                $player_2_games_played += 1;
                $player_1_games_played += 1;
	}

        	if ($this->request->is('post')) {
                        $game->winner = $winner;
                        $game->time_stamp = Time::now();
			$connection->update('users', ['games_won' => $player_1_games_won, 'games_played' => $player_1_games_played], ['id' => $player_1_id]);
			$connection->update('users', ['games_won' => $player_2_games_won, 'games_played' => $player_2_games_played], ['id' => $player_2_id]);
                        $this->Games->save($game);
        	}

        	if ($this->Games->save($game)) {
                	return $this->redirect(['action' => 'add', $params[5], $params[6]]);
            	}

        $this->set('game', $game);

	}
}
