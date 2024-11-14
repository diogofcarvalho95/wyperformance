<?php
$images = get_field('imagens');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

if ($images || $titulo || $descricao): ?>
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
        <?php if ($images):?>
            <div class="swiper-container relative my-slider-gallery mx-auto w-full rounded-lg overflow-hidden shadow-lg">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $image): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full max-h-96 object-cover" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
                <div class="swiper-pagination"></div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
