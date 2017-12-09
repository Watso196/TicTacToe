<?php
// src/Controller/GamesController.php

namespace App\Controller;

class GamesController extends AppController
{
	public function index()
    	{
    	}

  	public function add()
    	{
	$game = $this->Game->newEntity();
        	if ($this->request->is('post')) {
            		$game = $this->Game->patchEntity($game, $this->request->getData());
        	}

        	if ($this->Game->save($game)) {
                	return $this->redirect(['action' => 'add']);
            	}

        $this->set('game', $game);
    	}
}
