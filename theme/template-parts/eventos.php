<!-- I need to move this to a template part -->
<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $search_query = isset($_GET['s']) ? $_GET['s'] : '';
    $args = array(
        'post_type' => 'eventos',
        'posts_per_page' => 3,
        'paged' => $paged,
        's' => $search_query, 
    );
    $custom_query = new WP_Query($args); ?>

    <div class="container px-4 max-w-4xl space-y-8">
        <div class="space-y-2 text-center">
            <h1 class="text-3xl lg:text-4xl font-bold text-neutral-900">Eventos</h1>
            <p class="lead">Sugerimos-te atividades dentro e fora de portas.</p>
        </div>
        <div>
            <form method="get" action="<?php echo home_url( '/' ); ?>">
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Procurar eventos..." class="w-full p-2 border-none focus:outline-none text-gray-800">
                    <button type="submit" class="p-2 bg-[#f6b933] text-white hover:bg-[#54c4f4] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18l6-6-6-6"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <?php if ($custom_query->have_posts()): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                <?php while ($custom_query->have_posts()) : $custom_query->the_post();?> 

                    <article class="flex flex-col items-center gap-4 md:flex-row lg:gap-6">

                        <div class="group relative block h-56 w-full shrink-0 self-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-24 md:w-24 lg:h-40 lg:w-40">
                            <?php if(has_post_thumbnail()):
                                echo get_the_post_thumbnail( get_the_id(), 'thumbnail', array( 'class' => 'absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110' ) );
                            endif;?>
                        </div>

                        <div class="flex flex-col gap-2">

                            <h2 class="text-xl font-bold text-gray-800">
                                <?php echo esc_html(get_the_title());?>
                            </h2>

                            <?php if(get_the_excerpt()):?>
                                <p class="line-clamp-3 text-sm/6 text-gray-600"><?php echo esc_html(get_the_excerpt());?></p>
                            <?php endif;?>
                        </div>
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
            echo '<p>Não existem eventos.</p>';
        endif; ?>
    </div>