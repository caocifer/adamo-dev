{extends file="layout.tpl"}

{block name=main}
    <div class="product-detail-page">
        <div class="product-detail-first">
            <div class="uc_product_image_wrapper grid-5 alpha"> 
                <div class="uc_product_image">
                    <?php $block = block_load('views', 'product_slideshow-block');      
                    $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));        
                    print $output;?> 
                    <?php $block2 = block_load('views', 'product_slideshow_thumb-block');      
                    $output2 = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block2))));        
                    print $output2;?> 
                </div>
            </div>
            <div class="grid-7 omega">
                <div class="uc_product_title">
                    <?php print check_plain($node->title) ?>
                </div>
                <div class="uc_product_info grid-4 alpha"> 
                    <?php
                    /* Print the whole custom block (with divs, title etc.) */
                    $block = block_load('uc_add_to_cart_block','uc_add_to_cart_block');
                    print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                    ?>
                </div>
                <div class="uc_product_seller grid-3 omega"> 
                    <?php
                    $block = block_load('views','product_author_info-block');
                    print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
                    ?>			
                </div>
            </div>
        </div>

        <div class="uc_product_body"> <?php print render($content['body']);?> </div>

        <p>Total: <span class="uc-price product-info display-price uc-product-<?php $nid = $node->nid; print $nid; ?>"> <?php print uc_currency_format($node->sell_price); ?> </span></p>
    </div>
{/block}