<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $role
 *
 * @property \App\Model\Entity\Note[] $notes
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'username' => true,
        'password' => true,
        'role' => true,
        'notes' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    public function _setPassword($value){

        if (!empty($value)){
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }else{
            $id_user = $this->properties['id'];
            $user_password = TableRegistry::get('Users')->recoverPassword($id_user);
            return $user_password;
        }

        
    }
}
