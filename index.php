<?php

get_header();
	if(have_posts()){
		while(have_posts()){
			the_post();
			if(is_callable(['FLBuilderModel', 'is_builder_enabled']) && FLBuilderModel::is_builder_enabled()){
				the_content();
			} else { ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
					<h2>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php
							the_title(); ?>
						</a>
					</h2><?php
					the_content(); ?>
				</div><?php
			}
		}
	} else { ?>
		<div class="container">
			<h2><?php
				__('No posts found.'); ?>
			</h2><?php
			get_search_form(); ?>
		</div><?php
	}
	get_footer();
