<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order->load([
            'user',
            'items.product',
        ]);
    }

    public function render()
    {
        
        return view('livewire.admin.orders.order-details');
    }
}
