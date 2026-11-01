
<div>
    <button
        type="button"
        wire:click="addToCart"
        wire:loading.attr="disabled"
        wire:target="addToCart"
        class="flex h-10 w-full items-center justify-center gap-2 rounded-lg bg-teal-600 px-3 text-sm font-semibold text-white transition hover:bg-teal-700 disabled:opacity-60">
        <span wire:loading.remove wire:target="addToCart">
            Add to Cart
        </span>

        <span wire:loading wire:target="addToCart">
            Adding...
        </span>
    </button>
</div>
