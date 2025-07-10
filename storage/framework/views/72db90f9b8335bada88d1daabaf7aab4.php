<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('marketplace::app.admin.products.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-2.5 text-xl font-bold text-gray-800 dark:text-white">
            <?php echo app('translator')->get('marketplace::app.admin.products.index.title'); ?>
        </p>
    </div>

    <?php echo view_render_event('marketplace.admin.products.list.before'); ?>

    
    <!-- Datagrid -->
    <?php if (isset($component)) { $__componentOriginal3bea17ac3f7235e71a823454ccb74424 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3bea17ac3f7235e71a823454ccb74424 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.datagrid.index','data' => ['src' => ''.e(route('admin.marketplace.products.index')).'','isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => ''.e(route('admin.marketplace.products.index')).'','isMultiRow' => true]); ?>
        <!-- Datagrid Header -->
        <?php 
            $hasPermission = bouncer()->hasPermission('marketplace.products.edit') || bouncer()->hasPermission('marketplace.products.delete');
        ?>

        <template #header="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="! isLoading">
                <div class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 items-center border-b px-4 py-2.5 dark:border-gray-800">
                    <div
                        class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['product_flat_name', 'sku', 'product_type', 'flags_count'], ['base_image', 'price', 'quantity', 'marketplace_product_id'], ['seller_name', 'is_owner', 'is_approved']]"
                    >
                        <?php if($hasPermission): ?>
                            <label
                                class="flex w-max cursor-pointer select-none items-center gap-1"
                                for="mass_action_select_all_records"
                                v-if="! index"
                            >
                                <input
                                    type="checkbox"
                                    name="mass_action_select_all_records"
                                    id="mass_action_select_all_records"
                                    class="peer hidden"
                                    :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                    @change="selectAll"
                                >

                                <span
                                    class="icon-uncheckbox cursor-pointer rounded-md text-2xl"
                                    :class="[
                                        applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                            applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                        ),
                                    ]"
                                >
                                </span>
                            </label>
                        <?php endif; ?>

                        <p class="text-gray-600 dark:text-gray-300">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'text-gray-800 dark:text-white font-medium': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': available.columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            available.columns.find(columnTemp => columnTemp.index === column)?.sortable ? sort(available.columns.find(columnTemp => columnTemp.index === column)): {}
                                        "
                                    >
                                        {{ available.columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i
                                class="align-text-bottom text-base text-gray-800 dark:text-white ltr:ml-1 rtl:mr-1"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            ></i>
                        </p>
                    </div>
                </div>
            </template>

            <!-- Datagrid Head Shimmer -->
            <template v-else>
                <?php if (isset($component)) { $__componentOriginalc107096d39100b5f7264e4f2087676a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc107096d39100b5f7264e4f2087676a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.head','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $attributes = $__attributesOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__attributesOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc107096d39100b5f7264e4f2087676a5)): ?>
<?php $component = $__componentOriginalc107096d39100b5f7264e4f2087676a5; ?>
<?php unset($__componentOriginalc107096d39100b5f7264e4f2087676a5); ?>
<?php endif; ?>
            </template>
        </template>

        <!-- Datagrid Body -->
        <template #body="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="! isLoading">
                <div
                    class="row grid grid-cols-[2fr_1fr_1fr] grid-rows-1 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records"
                >
                    <!-- Products Name, sku, Product Number -->
                    <div class="flex gap-2.5">
                        <?php if($hasPermission): ?>
                            <input
                                type="checkbox"
                                :name="`mass_action_select_record_${record.marketplace_product_id}`"
                                :id="`mass_action_select_record_${record.marketplace_product_id}`"
                                :value="record.marketplace_product_id"
                                class="peer hidden"
                                v-model="applied.massActions.indices"
                                @change="setCurrentSelectionMode"
                            >

                            <label
                                class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"
                                :for="`mass_action_select_record_${record.marketplace_product_id}`"
                            ></label>
                        <?php endif; ?>

                        <div class="grid gap-y-1.5">
                            <p
                                class="text-base font-semibold text-gray-800 dark:text-white"
                                v-html="record.product_flat_name"
                            >
                            </p>

                            <div class="5 flex gap-x-1">
                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                >
                                    {{record.sku}} |
                                </p>
                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-html="record.product_type"
                                >
                                </p>
                            </div>

                            <a
                                :href="`<?php echo e(route('admin.marketplace.products.flags.index', '')); ?>/${record.marketplace_product_id}`"
                                class="text-sm text-blue-600 underline"
                            >
                                {{ "<?php echo app('translator')->get('marketplace::app.admin.products.index.datagrid.total-flags'); ?>".replace(':count', record.flags_count)}}
                            </a>
                        </div>
                    </div>

                    <!-- Image, Price, Quantity, Product ID -->
                    <div class="flex gap-1.5">
                        <div class="relative">
                            <template v-if="record.base_image">
                                <img
                                    class="max-h-16 min-h-full min-w-16 max-w-16 rounded"
                                    :src="`<?php echo e(Storage::url('')); ?>`+record.base_image"
                                />

                                <span
                                    class="bg-darkPink absolute bottom-px rounded-full px-1.5 text-xs font-bold leading-normal text-white ltr:left-px rtl:right-px"
                                    v-text="record.images_count"
                                >
                                </span>
                            </template>

                            <template v-else>
                                <div class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert">
                                    <img src="<?php echo e(bagisto_asset('images/product-placeholders/front.svg')); ?>">
                                </div>

                            </template>
                        </div>

                        <div class="grid gap-y-1.5">
                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="$admin.formatPrice(record.price)"
                            >
                            </p>

                            <!-- Product Quantity -->
                            <div v-if="['configurable', 'bundle', 'grouped', 'booking', 'downloadable'].includes(record.product_type)">
                                <p class="text-gray-600 dark:text-gray-300">
                                    <span class="text-red-600" v-text="'N/A'"></span>
                                </p>
                            </div>

                            <div v-else>
                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-if="record.quantity > 0"
                                >
                                    <span class="text-green-600">
                                        {{ "<?php echo app('translator')->get('marketplace::app.admin.products.index.datagrid.total-quantity'); ?>".replace(':quantity', record.quantity) }}
                                    </span>
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-else
                                >
                                    <span class="text-red-600">
                                        <?php echo app('translator')->get('marketplace::app.admin.products.index.datagrid.out-of-stock'); ?>
                                    </span>
                                </p>
                            </div>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                            >
                                {{ "<?php echo app('translator')->get('marketplace::app.admin.products.index.datagrid.product-id'); ?>".replace(':product_id', record.marketplace_product_id) }}
                            </p>
                        </div>
                    </div>

                    <!-- Seller Name, Is Owner, Is Approved, Product Type -->
                    <div class="flex items-center justify-between gap-x-4">
                        <div class="grid gap-1.5">
                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.seller_name"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.is_owner"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.is_approved"
                            >
                            </p>
                        </div>

                        <!-- Actions -->
                        <div
                            v-if="record.actions.length"
                            class="flex items-center"
                        >
                            <a
                                v-for="action in record.actions"
                                @click="performAction(action)"
                            >
                                <span
                                    class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 ltr:ml-1 rtl:mr-1"
                                    :class="action.icon"
                                    :title="action.title"
                                ></span>
                            </a>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Datagrid Body Shimmer -->
            <template v-else>
                <?php if (isset($component)) { $__componentOriginal601d211589286a2faeaa4f7f9edf9405 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal601d211589286a2faeaa4f7f9edf9405 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.datagrid.table.body','data' => ['isMultiRow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::shimmer.datagrid.table.body'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isMultiRow' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $attributes = $__attributesOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__attributesOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal601d211589286a2faeaa4f7f9edf9405)): ?>
<?php $component = $__componentOriginal601d211589286a2faeaa4f7f9edf9405; ?>
<?php unset($__componentOriginal601d211589286a2faeaa4f7f9edf9405); ?>
<?php endif; ?>
            </template>
        </template>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3bea17ac3f7235e71a823454ccb74424)): ?>
<?php $attributes = $__attributesOriginal3bea17ac3f7235e71a823454ccb74424; ?>
<?php unset($__attributesOriginal3bea17ac3f7235e71a823454ccb74424); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bea17ac3f7235e71a823454ccb74424)): ?>
<?php $component = $__componentOriginal3bea17ac3f7235e71a823454ccb74424; ?>
<?php unset($__componentOriginal3bea17ac3f7235e71a823454ccb74424); ?>
<?php endif; ?>

    <?php echo view_render_event('marketplace.admin.products.list.after'); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/packages/Webkul/Marketplace/src/Providers/../Resources/views/admin/products/index.blade.php ENDPATH**/ ?>