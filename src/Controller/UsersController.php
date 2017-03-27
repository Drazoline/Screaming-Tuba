<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\Mailer\Email;

class UsersController extends AppController
{
  public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add', 'logout');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->created = date("Y-m-d H:i:s");
            $user->modified = date("Y-m-d H:i:s");
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your user.'));
        }
        $this->set('user', $user);
    }

    public function edit($id = null)
    {
      $user = $this->Users->get($id);
      if ($this->request->is(['post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->data);
        $user->modified = date("Y-m-d H:i:s");
        if ($this->Users->save($user)) {
          $this->Flash->success(__('Your user has been updated.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your user.'));
      }
      $this->set('user', $user);
    }

    public function forgotPassword()
    {
      if ($this->request->is('post'))
      {
        if (!empty($this->request->data))
        {
          $email = $this->request->data['email'];
          $user = $this->Users->findByEmail($email)->first();

          if (!empty($user))
          {
            $password = sha1(Text::uuid());

            $password_token = Security::hash($password, 'sha256', true);

            $hashval = sha1($user->username . rand(1, 100));

            $user->password_reset_token = $password_token;
            $user->hashval = $hashval;

            $reset_token_link = Router::url(['controller' => 'Users', 'action' => 'resetPassword'], TRUE) . '/' . $password_token . '#' . $hashval;

            $email = new Email();
            $email->transport('mailjet');

            $email->sender(['tubascreaming@gmail.com' => 'Screaming Tuba'])
              ->to($user->email)
              ->subject('Reset Password')
              ->send($reset_token_link);

            $this->Users->save($user);
            $this->Flash->success('Please click on password reset link, sent in your email address to reset password.');
          }
          else
          {
            $this->Flash->error('Sorry! Email address is not available here.');
          }
        }
      }
    }

    public function resetPassword($token = null) {
        if (!empty($token)) {

            $user = $this->Users->findByPasswordResetToken($token)->first();

            if ($user) {

                if (!empty($this->request->data)) {
                    $user = $this->Users->patchEntity($user, [
                        'password' => $this->request->data['new_password'],
                        'new_password' => $this->request->data['new_password'],
                        'confirm_password' => $this->request->data['confirm_password']
                            ], ['validate' => 'password']
                    );

                    $hashval_new = sha1($user->username . rand(1, 100));
                    $user->password_reset_token = $hashval_new;

                    if ($this->Users->save($user)) {
                        $this->Flash->success('Your password has been changed successfully');
                        /**$emaildata = ['name' => $user->first_name, 'email' => $user->email];
                        $this->getMailer('SendEmail')->send('changePasswordEmail', [$emaildata]); //Send Email functionality**/

                        $this->redirect(['action' => 'view']);
                    } else {
                        $this->Flash->error('Error changing password. Please try again!');
                    }
                }
            } else {
                $this->Flash->error('Sorry your password token has been expired.');
            }
        } else {
            $this->Flash->error('Error loading password reset.');
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id)
    {
      $this->request->allowMethod(['post', 'delete']);
      $user = $this->Users->get($id);
      if ($this->Users->delete($user)) {
        $this->Flash->success(__('The user with id: {0} has been deleted', h($id)));
        return $this->redirect(['action' => 'index']);
      }
    }
}
