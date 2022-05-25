<?php if(count($combinations[0]) > 0): ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(trans('messages.Variant')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(trans('messages.Variant Price')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(trans('messages.SKU')); ?></label>
				</td>
				<td class="text-center">
					<label for="" class="control-label"><?php echo e(trans('messages.Quantity')); ?></label>
				</td>
			</tr>
		</thead>
		<tbody>
<?php endif; ?>
<?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$sku = '';
		foreach (explode(' ', $product_name) as $key => $value) {
			$sku .= substr($value, 0, 1);
		}

		$str = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				if($colors_active == 1){
					$color_name = \App\Model\Color::where('code', $item)->first()->name;
					$str .= $color_name;
					$sku .='-'.$color_name;
				}
				else{
					$str .= str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				}
			}
		}
	?>

	<?php if(strlen($str) > 0): ?>
			<tr>
				<td>
					<label for="" class="control-label"><?php echo e($str); ?></label>
				</td>
				<td>
					<input type="number" name="price_<?php echo e($str); ?>" value="<?php echo e($unit_price); ?>" min="0" step="0.01" class="form-control" required>
				</td>
				<td>
					<input type="text" name="sku_<?php echo e($str); ?>" value="<?php echo e($sku); ?>" class="form-control" required>
				</td>
				<td>
					<input type="number" name="qty_<?php echo e($str); ?>" value="1" min="1" max="1000000" step="1" class="form-control" required>
				</td>
			</tr>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<script>
	update_qty();
	function update_qty()
	{
		var total_qty = 0;
		var qty_elements = $('input[name^="qty_"]');
		for(var i=0; i<qty_elements.length; i++)
		{
			total_qty += parseInt(qty_elements.eq(i).val());
		}
		if(qty_elements.length > 0)
		{

			$('input[name="current_stock"]').attr("readonly", true);
			$('input[name="current_stock"]').val(total_qty);
		}
		else{
			$('input[name="current_stock"]').attr("readonly", false);
		}
	}
	$('input[name^="qty_"]').on('keyup', function () {
		var total_qty = 0;
		var qty_elements = $('input[name^="qty_"]');
		for(var i=0; i<qty_elements.length; i++)
		{
			total_qty += parseInt(qty_elements.eq(i).val());
		}
		$('input[name="current_stock"]').val(total_qty);
	});

</script>
<?php /**PATH /home/jj/Desktop/MrZ/WebVision/AdamG/Admin/resources/views/admin-views/product/partials/_sku_combinations.blade.php ENDPATH**/ ?>