<?php
namespace App\Controller;

use Cake\ORM\ResultSet;

use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
	public function newGame() {

		$users = TableRegistry::get('Users');

		$user = $this->Users->newEntity();

		$createNewUser = function ($entity) use ($username) {
                        $entity->username = $this->request-getData('username');
                        $entity->games_won = 0;
                        $entity->games_played = 0;
                  	return $entity;
		};

		if ($this->request->is('post')) {
			$username = $this->request->getData('username_one');
			$user_1 = findOrCreate(['username' => $username], $createNewUser );

			$username = $this->request->getData('username_one');
			$user_2 = findOrCreate(['username' => $username], $createNewUser );
			return array( $user_1, $user_2 );
		}

	}

	public function view() {

		//$users = TableRegistry::get('Users');
		$query = $users->find('all');
		foreach ($query as $row) {
		}
		$results = $query->all();
		$data = $results->toArray();

		$users = $data;

	}
}
