<?php 
/*
Template Name: Archives
*/
get_header('archive'); ?>
<section class="Hoicosnews-wrapper">
  
  <main class="main">
    <a class="hot-topic" href="/about-hoicos">
      <img class="image-blog" src="<?php echo get_template_directory_uri(); ?>/images/集合写真.jpg" alt="コーディング画面">
      <span class="content-blog">
        <div class="title-blog">Hoicosプログラミング教室について</div>
        <div class="desc">短期で楽しくプログラミングを学べる小学生向けの教室</div>
        <time class="date-blog">2020.10.10</time>
      </span>
    </a> 
  </main>  
  
  <div class="articles-blog">
    <div class="article-archive-wrap">
    <div class="clearfix">
      <?php if ( have_posts() ): ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        //ページ情報の取得
        $page = get_page(get_the_ID());
        //上で取得したページ情報からスラッグ名を取得
        $slug = $page->post_name; //固定ページからスラッグを取得し、変数$slugに代入する<br />
        ?>
      <a href="https://www.hoicosschool.com/<?php echo $slug; ?>" class="article-box">
        <div class="title-blog"><?php the_title(); ?></div>
        <div class="subtext">
          <div id="index">
            
              <?php get_index(); //ここで<h>を出力する?>
            </div>
        </div>
       
          <!--アイキャッチ画像の取得表示-->
        <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
        <?php endif; ?>
        <time datetime="<?php the_time('Y-m-d'); ?>" class="date-blog"><?php the_time('Y-m-d'); ?></time>
      </a>
       <?php endwhile; ?>
       <?php else: ?>
      <p>Not Found.</p>
      <?php endif; ?>
    </div>

      <!--ページャ**＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊-->
      <div>
        <?php global $wp_rewrite;
        $paginate_base = get_pagenum_link(1);
        if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
          $paginate_format = '';
          $paginate_base = add_query_arg('paged','%#%');
        }
        else{
          $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
          user_trailingslashit('page/%#%/','paged');;
          $paginate_base .= '%_%';
        }
        echo paginate_links(array(
          'base' => $paginate_base,
          'format' => $paginate_format,
          'total' => $wp_query->max_num_pages,
          'mid_size' => 14,
          'current' => ($paged ? $paged : 1),
          'prev_text' => '«',
          'next_text' => '»',
        )); ?>
      </div>
   </div>




   <div class="sidemenu">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-archive') ) : ?>
	<?php endif; ?>
      
      </div>
  </div>

  </section>

 

  
<?php get_footer('blog'); ?>