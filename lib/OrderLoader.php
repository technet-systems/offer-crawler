<?php

class OrderLoader
{
    public function getOrders(Array $newOrders)
    {
        $orders = [];

        foreach ($newOrders as $newOrder => $category) {
            $order = new Order();
            $order->setUrl($newOrder);
            $order->setCategory($category);
            $orders[] = $order;
        }

        return $orders;
    }
}