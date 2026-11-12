<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $paymentMethod = '';
    public $fromDate = '';
    public $toDate = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function updatedPaymentMethod()
    {
        $this->resetPage();
    }

    public function updatedFromDate()
    {
        $this->resetPage();
    }

    public function updatedToDate()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
            'status',
            'paymentMethod',
            'fromDate',
            'toDate',
        ]);

        $this->resetPage();
    }

    public function render()
    {
        $orders = Order::with('user')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('order_number', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($userQuery) {
                            $userQuery->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('email', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when($this->paymentMethod, function ($query) {
                $query->where('payment_method', $this->paymentMethod);
            })
            ->when($this->fromDate, function ($query) {
                $query->whereDate('created_at', '>=', $this->fromDate);
            })
            ->when($this->toDate, function ($query) {
                $query->whereDate('created_at', '<=', $this->toDate);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.orders.order-index', [
            'orders' => $orders,
        ]);
    }
}
