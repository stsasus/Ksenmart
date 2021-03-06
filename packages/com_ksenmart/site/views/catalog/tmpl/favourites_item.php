<?php defined('_JEXEC') or die(); ?>
<?php
    $flag = true;
	foreach($this->product->properties as $prop){
       if($prop->type != 'text'){
           if(count($prop->values) > 0){
    	       $flag = false;
               break;
    	   }
       }
	}
?>
<div class="item noTransition" data-id="<?php echo $this->product->id; ?>">
	<form method="post" action="<?php echo $this->product->add_link_cart; ?>" class="clearfix">        
		<div class="img">
			<a href="<?php echo $this->product->link; ?>" title="<?php echo $this->product->title; ?>">
				<img src="<?php echo $this->product->small_img; ?>" alt="<?php echo $this->product->title; ?>" class="span12" />
			</a>
			<?php echo ($this->product->hot == 1?'<span class="hit"></span>':'')?>
			<?php echo ($this->product->recommendation == 1?'<span class="super"></span>':''); ?>
			<?php echo ($this->product->new == 1?'<span class="new"></span>':''); ?>
			<?php echo ($this->product->promotion == 1?'<span class="act"></span>':''); ?>
		</div>
		<div class="name">
			<a href="<?php echo $this->product->link?>" title="<?php echo $this->product->title; ?>">
				<?php echo $this->product->title; ?>
			</a>
		</div>
        <?php if(!empty($this->product->manufacturer_title)){ ?>
            <div class="desc"><?php echo $this->product->manufacturer_title; ?></div>
        <?php }?>
        <?php if(!empty($this->product->product_code)){ ?>
            <div class="art">Артикул: <?php echo $this->product->product_code; ?></div>
        <?php }?>
        <div class="price"><?php echo $this->product->val_price; ?></div>
        <div class="avail">В наличии</div>
        <div class="bottom">
            <a class="favs js-favourite_product-remove" href="javascript:void(0);">Удалить</a>
            <a class="comps comps-remove js-compare_product" href="javascript:void(0);">Сравнить</a>
        </div>

        <input type="hidden" name="count" value="<?php echo $this->product->product_packaging; ?>" />
		<input type="hidden" name="product_packaging" value="<?php echo $this->product->product_packaging; ?>" />
		<input type="hidden" name="id" value="<?php echo $this->product->id; ?>" />
	</form>
</div>