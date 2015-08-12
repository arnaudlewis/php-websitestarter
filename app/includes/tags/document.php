<?php

use Prismic\Predicates;


/**
 * Tags related to pages (as in: documents of the "page" type)
 */

function home()
{
    global $WPGLOBAL;
    $prismic = $WPGLOBAL['prismic'];

    return $prismic->home();
}

function page_link($page)
{
    global $WPGLOBAL;
    $app = $WPGLOBAL['app'];
    $classes = array();
    $active = $app->request()->getPath() == $page['url'];
    if ($active) {
        array_push($classes, 'active');
    }
    if ($page['external'] == true) {
        array_push($classes, 'external');
    }

    return '<a href="'.$page['url'].'" class="'.implode(' ', $classes).'">'.$page['label'].'</a>';
}

function slice_content($slice, $linkResolver)
{
    global $WPGLOBAL;
    $sliceFile  = views_dir()
                .'/slices/'
                .$slice->getSliceType();
    $sliceLabelFile = $sliceFile.'-'.$slice->getLabel().'.php';
    $sliceFile = $sliceFile.'.php';
    if (file_exists($sliceLabelFile)) {
        include $sliceLabelFile;
    } elseif (file_exists($sliceFile)) {
        include $sliceFile;
    } else {
        echo $slice->asHtml($linkResolver);
    }
}

function the_content()
{
    global $WPGLOBAL, $loop;
    $prismic = $WPGLOBAL['prismic'];
    $doc = $loop->current_post();
    if (!$doc) {
        return;
    }
    $body = $doc->getSliceZone($doc->getType().'.body');
    if ($body) {
        foreach ($body->getSlices() as $slice) {
            slice_content($slice, $prismic->linkResolver);
        }
    }
}

function get_pages()
{
    $home = home();
    if (array_key_exists('children', $home)) {
        return $home['children'];
    } else {
        return array();
    }
}
/**
 * Most of these functions accept a $document as parameter.
 * For the single page, the document can be omitted.
 *
 * get_* function will return the values, others will output them.
 *
 * The way the tags are written can lead to the same request being done several times,
 * but it's OK because the Prismic kit has a built-in cache (APC).
 */

// Fetch the most recent posts and put them in the loop

function recent_posts($pageSize)
{
    global $WPGLOBAL, $loop;
    $prismic = $WPGLOBAL['prismic'];

    $pageSize = $pageSize ? $pageSize->getValue() : 5;

    $posts = $prismic->form()
        ->query(Predicates::at('document.type', 'post'))
        ->pageSize($pageSize)
        ->fetchLinks(
            'post.date',
            'category.name',
            'author.full_name',
            'author.first_name',
            'author.surname',
            'author.company'
        )
        ->orderings('my.post.date desc')
        ->submit();

    $loop->setResponse($posts);
}

// Loop management

function full_articles($value)
{
    global $loop;
    return $loop->fullArticles = $value;
}

function have_posts()
{
    global $loop;
    return $loop->has_more();
}

function count_posts()
{
    global $loop;
    return $loop->size();
}

function the_post()
{
    global $loop;
    $loop->increment();
}

function rewind_posts()
{
    global $loop;
    $loop->reset();
}

function the_ID()
{
    global $loop;
    echo $loop->current_post()->getId();
}

function the_permalink()
{
    echo get_permalink();
}

function get_permalink($id = null)
{
    global $WPGLOBAL, $loop;
    $prismic = $WPGLOBAL['prismic'];
    $post = $id ? $prismic->get_document($id) : $loop->current_post();

    return $post ? $prismic->linkResolver->resolveDocument($post) : null;
}

function the_title()
{
    global $loop;
    $doc = $loop->current_post();
    if ($doc) {
        return $doc->getText($doc->getType().'.title');
    }
}

function the_title_attribute()
{
    return the_title();
}

function the_date_link($format = 'F, jS Y')
{
    global $loop;
    $date = get_date('post.date', $loop->current_post());
    if (!$date) {
        return;
    }
    if ($date instanceof \Prismic\Fragment\Date) {
        $date = $date->asDateTime();
    }
    $label = date_format($date, $format);
    $url = archive_link($date->format('Y'), $date->format('m'), $date->format('d'));
    return '<a class="created-at" href="'.$url.'">'.$label.'</a>';
}

function get_the_date($format = 'F, jS Y')
{
    global $loop;
    $date = get_date('post.date', $loop->current_post());
    if (!$date) {
        return;
    }
    if ($date instanceof \Prismic\Fragment\Date) {
        $date = $date->asDateTime();
    }

    return date_format($date, $format);
}

function get_the_time($format = 'g:iA')
{
    global $loop;
    $date = get_date('post.date', $loop->current_post());
    if (!$date) {
        return;
    }
    if ($date instanceof \Prismic\Fragment\Date) {
        $date = $date->asDateTime();
    }

    return date_format($date, $format);
}

function valid_meta($meta) {
    return $meta && strlen($meta) > 0;
}

function the_post_metas() {
    $meta = [];
    if(valid_meta(the_date_link())) array_push($meta, the_date_link());
    if(valid_meta(the_author_link())) array_push($meta, the_author_link());
    if(valid_meta(the_category())) array_push($meta, the_category());
    if(valid_meta(get_the_tag_list())) array_push($meta, get_the_tag_list());

    return implode(" | ", $meta);
}

function the_post_illustration() {
    global $WPGLOBAL, $loop;
    $prismic = $WPGLOBAL['prismic'];
    $doc = $loop->current_post();
    if (!$doc) {
        return;
    }
    $illustration = $doc->getImage($doc->getType().'.post_illustration');
    if($illustration && $illustration->getMain()) return $illustration->getMain()->getUrl();
}

function the_post_summary()
{
    global $WPGLOBAL, $loop;
    $prismic = $WPGLOBAL['prismic'];
    $app = $WPGLOBAL['app'];
    $prismicEndpoint = $app->config("prismic.url");
    $doc = $loop->current_post();
    if (!$doc) {
        return;
    }
    $summary = $doc->getStructuredText($doc->getType().'.summary');
    return $summary ? $summary->asText() : "";
}

function get_post_type()
{
    global $loop;
    $doc = $loop->current_post();
    if (!$doc) {
        return;
    }

    return $doc->getType();
}

function get_the_tags()
{
    global $loop;
    $doc = $loop->current_post();
    if (!$doc) {
        return array();
    }

    return $doc->getTags();
}

function the_tags($before = '', $sep = '', $after = '')
{
    echo get_the_tag_list($before, $sep, $after);
}

function get_the_tag_list($before = '', $sep = '', $after = '')
{
    $tags = get_the_tags();
    if (count($tags) == 0) {
        return;
    }
    $result = $before;
    $result .= implode($sep, array_map(function ($tag) use ($sep) {
        return '<a href="/tag/'.$tag.'">'.$tag.'</a>';
    }, $tags));
    $result .= $after;

    return '<span class="tags">'.$result.'</span>';
}

// Other tags

function html_doc_title() {

    return single_post_title() ? single_post_title() . " - " . site_title()  : site_title();
}

function single_post()
{
    global $WPGLOBAL;
    if (isset($WPGLOBAL['single_post'])) {
        return $WPGLOBAL['single_post'];
    }

    return;
}

function document_url($document)
{
    global $WPGLOBAL;
    $prismic = $WPGLOBAL['prismic'];

    return $prismic->linkResolver->resolveDocument($document);
}

function link_to_post($post)
{
    return '<a href="'.document_url($post).'">'.post_title($post).'</a>';
}

function single_post_title($prefix = '', $display = true)
{
    global $WPGLOBAL;
    $prismic = $WPGLOBAL['prismic'];
    if (!single_post()) {
        return;
    }
    return  $prefix . single_post()->getText(single_post()->getType() . '.title');
}

function single_post_date_text($format = 'F, jS Y')
{
    global $loop;
    $date = get_date('post.date', $loop->current_post());
    if ($date) {
        if ($date instanceof \Prismic\Fragment\Date) {
            $date = $date->asDateTime();
        }
        return date_format($date, $format);
    }
}

function single_post_date($format = 'F, jS Y')
{
    $date = single_post_date_text($format);
    if ($date) {
        echo $date ? '<span class="date">'.$date.'</span>' : '';
    }
}

function single_post_author_text()
{
    global $WPGLOBAL, $loop;
    $prismic = $WPGLOBAL['prismic'];
    $post = $loop->current_post();
    if (!$post) {
        return;
    }
    $author = $post->getLink($post->getType().'.author');
    if (!$author) {
        return;
    }
    return $author->getText('author.full_name');
}

function single_post_author()
{
    $author = single_post_author_text();

    echo $author ? '<span class="author">'.$author.'</span>' : '';
}

function get_date($field, $doc)
{
    if (!$doc) {
        return;
    }
    if ($doc instanceof Author) {
        return;
    }

    return $doc->getDate($field);
}
