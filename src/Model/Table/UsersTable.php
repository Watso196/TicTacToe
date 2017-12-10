namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config) {
        $this->setTable('users');
	$this->setPrimaryKey('username');

	$usersTable = TableRegistry::get('Users');
	$user = $usersTable->newEntity();

	if ($usersTable->save($user)) {
        	// The $article entity contains the id now
        	$id = $user->id;
	}

    }
}

