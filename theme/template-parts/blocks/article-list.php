<?php
$artigos = get_field('artigos');
$nrartigos = min(count($artigos), 3);
$titulo = get_field('titulo');
$descricao = get_field('descricao');

if ($artigos || $titulo || $descricao): ?>
    <div class="container px-4 max-w-4xl space-y-8 text-center">
        <?php if ($titulo || $descricao):?>
            <div class="space-y-2">
                <?php if ($titulo):?>
                    <h2 class="text-3xl lg:text-4xl font-bold text-neutral-900"><?php echo esc_html($titulo);?></h2>
                <?php endif; ?>
                <?php if ($descricao):?>
                    <p class="lead"><?php echo esc_html($descricao);?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($artigos):?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-<?php echo $nrartigos;?> gap-4 md:gap-6">
                <?php foreach( $artigos as $artigo ):?> 
                    <article class="flex flex-col items-start justify-between">
                        <a href="<?php the_permalink($artigo); ?>" class="group block space-y-4">
                            <?php if(has_post_thumbnail($artigo)):
                                echo get_the_post_thumbnail( $artigo, 'medium', array( 'class' => 'rounded-lg max-w-full w-full border-gray-500 overflow-hidden' ) );
                            endif;?>
                            <h3 class="text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                <?php echo esc_html(get_the_title($artigo));?>
                            </h3>
                            <?php if(get_the_excerpt($artigo)):?>
                                <p class="line-clamp-3 text-sm/6 text-gray-600"><?php echo esc_html(get_the_excerpt($artigo));?></p>
                            <?php endif;?>
                        </a>
                    </article>
                <?php endforeach;?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
