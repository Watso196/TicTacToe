<?php
namespace App\Controller;

use Cake\ORM\ResultSet;

use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
	public function newGame() {

		$usersTable = TableRegistry::get('Users');

		if ($this->request->is('post')) {
			$username1 = $this->request->getData('username_one');
			if (!$usersTable->findByUsername($username1)) {

				$user1 = $usersTable->newEntity();
				$user1->username = $username1;
				$user1->games_won = 0;
				$user1->games_player = 0;
				if ($this->Users->save($user1)) {
                        		$this->Flash->success(__('Your username item has been saved.'));
                        	} else {
					$this->Flash->error(__('Unable to add your username.'));
				}
			}

			$username2 = $this->request->getData('username_two');
			if (!$usersTable->findByUsername($username1)) {
				$user2 = $usersTable->newEntity();
				$user2->username = $username2;
                        	$user2->games_won = 0;
                        	$user2->games_player = 0;
                        	if ($this->Users->save($user2)) {
                                	$this->Flash->success(__('Your username item has been saved.'));
                        	} else {
					$this->Flash->error(__('Unable to add your username.'));
				}
			}

			return $this->redirect(['controller' => 'Games', 'action' => 'add', $username1, $username2 ]);
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
