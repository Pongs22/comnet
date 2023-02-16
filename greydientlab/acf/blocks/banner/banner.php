<?php
/**
 * Banner Template.
 *
 * @package greydientlab
 */

use Lean\Load;
?>
<div class="banner">
	<?php
		Load::atom(
			'buttons/button',
			array(
				'class' => 'gl-btn-orange',
				'title' => 'TEST',
			)
		);
		?>

	<?php
		Load::atom(
			'buttons/button',
			array(
				'class' => 'gl-btn-blue',
				'title' => 'Greydient Lab',
			)
		);
		?>
</div>
