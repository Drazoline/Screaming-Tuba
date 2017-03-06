<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Godin
 * Date: 2017-03-06
 * Time: 10:44
 */
namespace App\Controller;

class SubscriptionsController extends AppController
{
    public function index()
    {
        $subscriptions = $this->Subscriptions->find('all');
        $this->set(compact('subscriptions'));
    }
}