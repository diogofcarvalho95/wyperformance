<!-- I need to move this to a template part -->
<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $search_query = isset($_GET['s']) ? $_GET['s'] : '';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'paged' => $paged,
        's' => $search_query, 
    );
    $custom_query = new WP_Query($args); ?>

    <div class="container px-4 max-w-4xl space-y-8 text-center">
        <div class="space-y-2">
            <h1 class="text-3xl lg:text-4xl font-bold text-neutral-900">Blog</h1>
            <p class="lead">Learn how to grow your business with our expert advice.</p>
        </div>
        <div>
            <form method="get" action="<?php echo home_url( '/' ); ?>">
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Procurar artigos..." class="w-full p-2 border-none focus:outline-none text-gray-800">
                    <button type="submit" class="p-2 bg-[#f6b933] text-white hover:bg-[#54c4f4] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6-6-6"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <?php if ($custom_query->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 md:gap-6">
                <?php while ($custom_query->have_posts()) : $custom_query->the_post();?> 
                    <article class="flex flex-col items-start justify-between">
                        <a href="<?php the_permalink(); ?>" class="group block space-y-4">
                            <?php if(has_post_thumbnail()):
                                echo get_the_post_thumbnail( get_the_id(), 'medium', array( 'class' => 'rounded-lg max-w-full w-full border-gray-500 overflow-hidden' ) );
                            endif;?>
                            <h3 class="text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                <?php echo esc_html(get_the_title());?>
                            </h3>
                            <?php if(get_the_excerpt()):?>
                                <p class="line-clamp-3 text-sm/6 text-gray-600"><?php echo esc_html(get_the_excerpt());?></p>
                            <?php endif;?>
                        </a>
                    </article>
                <?php endwhile;?>
            </div>
            <div>
                <?php 
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, $paged),
                    'total' => $custom_query->max_num_pages,
                    'prev_text' => __('« Anterior', 'your-text-domain'),
                    'next_text' => __('Próximo »', 'your-text-domain'),
                    'type' => 'list',
                ));wp_reset_postdata();?>
            </div>
        <?php else :
            echo '<p>No posts found.</p>';
        endif; ?>
    </div>