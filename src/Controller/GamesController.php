<?php
// src/Controller/GamesController.php

namespace App\Controller;

use cake\I18n\Time;

use Cake\ORM\TableRegistry;

class GamesController extends AppController
{
  	public function add() {

	$gamesTable = TableRegistry::get('Games');

	$winner = $this->request->getData('form');

	$game = $gamesTable->newEntity();

	$url = $this->request->here;

        $params = explode("/", $url);

        	if ($this->request->is('post')) {
                        $game->winner = $winner;
                        $game->time_stamp = Time::now();
                        if ($this->Games->save($game)) {
                                $this->Flash->success(__('Your game has been saved.'));
			}
        	}

        	if ($this->Games->save($game)) {
                	return $this->redirect(['action' => 'add', $params[5], $params[6]]);
            	}

        $this->set('game', $game);

	}
}
