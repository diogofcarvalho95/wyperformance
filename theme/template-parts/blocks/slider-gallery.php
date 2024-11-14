<?php
$images = get_field('imagens');

if ($images): ?>
    <div class="swiper-container relative my-slider-gallery mx-auto max-w-4xl rounded-lg overflow-hidden shadow-lg">
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
