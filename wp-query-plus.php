<?php



// global $wp_query;

// var_dump($wp_query);

// var_dump($wp_query->get_queried_object_id());

$aaa = array();
$permalink = "";

// var_dump($_SERVER["REQUEST_URI"]);

$sorted_permalink = add_query_arg(array(
      "orderby" => array( "title", "date" ),
      "order" => array("ASC", "DESC"),
      "post_type" => array("post", "page")
    ));

// echo "<a href=\"$sorted_permalink\">$sorted_permalink</a>";

if (have_posts()) {
  var_dump($wp_query);
  while(have_posts()) {
    the_post();
    $permalink = get_the_permalink();
    echo "<h1>" . get_the_title() . "</h1>";
  }
}

// function is_assoc($var) {
//   return is_array($var) && array_diff_key($var,array_keys(array_keys($var)));
// }

// $query_args = array(
//   "orderby" => array(),
//   "post_type" => array("post")
// );

// foreach(array_keys($query_args) as $arg_name) {
//   if (isset($_GET, $arg_name) && !empty($_GET[$arg_name])) {
//     if (is_assoc($_GET[$arg_name])) {
//       $query_args[$arg_name] = $_GET[$arg_name];
//     } else {
//       $query_args[$arg_name] = explode(',', urldecode($_GET[$arg_name]));
//     }
// 	}
// }


// print_filter_control('category', [], "/", 0, 0);

// $default_args = array(
//   "post_type" => ['post', "page"],
// );

// $wp_query_args = wp_parse_args($_GET, $default_args);


// $the_query = new WP_Query( $wp_query_args );
// if ( $the_query->have_posts() ) {
//   while ( $the_query->have_posts() ) {
//       $the_query->the_post();
//       echo "<div>" . get_the_title() . "</div>";
//       echo get_the_date();
//       echo "</hr>";
//   }
//   wp_reset_postdata();
// }

// var_dump($wp_query_args);

// echo "<ul>";

// $url_args = wp_parse_args($_GET, array());

// var_dump($url_args);

// echo "<li>" . . "</li>"

// echo "</ul>";

// $the_query = new WP_Query( $wp_query_args );
// var_dump($wp_query_args);
// if ( $the_query->have_posts() ) {
//   while ( $the_query->have_posts() ) {
//       $the_query->the_post();
//       echo "<div></div>";
//       echo get_the_title();
//       echo "<div></div>";
//       echo get_the_date();
//       echo "</hr>";
//   }
//   wp_reset_postdata();
// }


// Single
// Multiple AND
// Multiple OR

function query_plus_render_admin_page() {
	$post_type_query_vars = array_map(function ($post_type) {
		return $post_type->query_var;
	}, get_post_types(array("publicly_queryable" => true), "objects"));

	$taxonomy_query_vars = array_map(function ($taxonomy) {
		return $taxonomy->query_var;
	}, get_taxonomies(array("public" => true), "objects"));

}

function query_plus_register_admin_page() {
	add_submenu_page(
		"options-general.php",
		"Query Plus",
		"Query Plus",
		"edit_theme_options",
		"query-plus",
		"query_plus_render_admin_page",
		9999
	);
}
add_action("admin_menu","query_plus_register_admin_page");


 // add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )

// function pnp_modify_custom_query($query) {
// 	var_dump($query);
// 	die();
// }
// add_action("pre_get_posts", "pnp_modify_custom_query");

// function print_filter_control($taxonomy, $filter_args, $base_url, $parent) {
// 	unset($filter_args["pagenum"]);
// 	$terms_field_empty = true;

// 	$terms = get_terms( $taxonomy, array('hide_empty' => false, "parent" => $parent ));
// 	if (sizeof($terms) == 0) return;

// 	echo "<ul>";

// 	foreach ( $terms as $term ) {
// 		echo "<li>" . $term->name . "</li>";
// 		print_filter_control($taxonomy, $filter_args, $base_url, $term->term_id);
// 	}

// 	echo "</ul>";
// }


