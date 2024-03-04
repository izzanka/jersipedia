<div class="col-2">
    <b class="float-end mb-3">
        @currency($orderDetail->product->price)
    </b>
    <input type="number" class="form-control form-control-sm rounded-3 text-center" wire:model.blur="qty">
</div>
