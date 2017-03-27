<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Symphony\Component\Console\Helper\Table;

class SubscriptionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $subscriptions = $this->Subscriptions->find('all')
        ->contain([
            'Users',
            'Users'
        ]);
        $this->set(compact('subscriptions'));
    }

    public function add(){
        $subscription = $this->Subscriptions->newEntity();
        if ($this->request->is('post'))
        {
            $subscription = $this->Subscriptions->patchEntity($subscription, $this->request->data);
            $subscription->created = date("Y-m-d H:i:s");
            $subscription->modified = date("Y-m-d H:i:s");
            if ($this->Subscriptions->save($subscription)) {
                $this->Flash->success(__('Your subscription has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your subscription.'));
        }
        $this->set('subscription', $subscription);
        $this->getUsers();

    }

    private function getUsers()
    {
        $users_table = TableRegistry::get('Users');
        $users = $users_table->find('list');
        $this->set(compact('users'));
    }


    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subscription= $this->Subscriptions->get($id);
        if ($this->Subscriptions->delete($subscription)) {
            $this->Flash->success(__('The subscription with id: {0} has been deleted.', h($id
            )));
            return $this->redirect(['action' => 'index']);
        }
    }
}
