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
		$users = $connection
                        ->newQuery()
                        ->select('*')
                        ->from('users')
                        ->execute()
                        ->fetchAll('assoc');

		if ($this->request->is('post')) {
			$username1 = $this->request->getData('username_one');
			$username2 = $this->request->getData('username_two');

			$user1_validate = False;
			$user2_validate = False;

			foreach ($users as $user) {
				if ($user['username'] == $username1) {
					$user1_validate = True;
				}
				if ($user['username'] == $username2) {
                                        $user2_validate = True;
				}
			}

			if ($user1_validate == False) {
				$user1 = $usersTable->newEntity();
				$user1->username = $username1;
				$user1->games_won = 0;
				$user1->games_played = 0;
				$this->Users->save($user1);
			}

			if ($user2_validate == False) {
				$user2 = $usersTable->newEntity();
				$user2->username = $username2;
                	       	$user2->games_won = 0;
              	     		$user2->games_played = 0;
				$this->Users->save($user2);
			}
			return $this->redirect(['controller' => 'Games', 'action' => 'add', $username1, $username2 ]);
		}
	}


	public function view() {

		$connection = ConnectionManager::get('default');

		$users = $connection
                        ->newQuery()
                        ->select('*')
                        ->from('users')
			->order(['games_won' => 'DESC'])
                        ->execute()
                        ->fetchAll('assoc');

	}
}
