<style>

	.mgl-cascade {
		display: <?= ($isPreview ? 'block' : 'none') ?>;
	}

	<?= $class_id ?> {
		margin: <?= -1 * ( $gutter / 2 ) ?>px;
	}

	<?= $class_id ?> .mgl-box {
		padding: <?= $gutter / 2 ?>px;
	}

	@media screen and (max-width: 600px) {
		<?= $class_id ?>  figcaption {
			display: none
		}
	}

</style>
