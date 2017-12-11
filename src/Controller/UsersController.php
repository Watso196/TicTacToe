<?php
namespace App\Controller;

use Cake\ORM\ResultSet;

use Cake\Datasource\ConnectionManager;

use Cake\ORM;

use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
	public function newGame() {

		$usersTable = TableRegistry::get('Users');

		$connection = ConnectionManager::get('default');

		if ($this->request->is('post')) {
			$username1 = $this->request->getData('username_one');
			$username2 = $this->request->getData('username_two');

			$user1_query = $connection
                	->newQuery()
                	->select('username')
                	->from('users')
                	->where(['username >' => $username1])
                	->execute()
                	->fetch('assoc');

			$user2_query = $connection
                        ->newQuery()
                        ->select('username')
                        ->from('users')
                        ->where(['username >' => $username2])
                        ->execute()
                        ->fetch('assoc');

			if (!$user1_query) {
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

			if (!$user2_query) {
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
