<?php if(core()->getConfigData('marketplace.settings.general.status')): ?>
    <a
        href="<?php echo e(route('shop.marketplace.index')); ?>"
        aria-label="Sell"
    >
        <span class="mp-store-icon inline-block cursor-pointer text-[24px]"></span>
    </a>
<?php endif; ?>
<?php /**PATH /var/www/html/packages/Webkul/Marketplace/src/Providers/../Resources/views/components/shop/layouts/header/sell.blade.php ENDPATH**/ ?>