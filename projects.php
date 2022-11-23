<?php
/**
 * Plugin Name: MKOne Projects Plugin
 * Description: This plugin will add a Custom Post Type for Projects
 * Plugin URI: https://marianakyrkosh.com
 * Author: Mariana Kyrkosh
 * Version: 1
**/

//* Don't access this file directly
defined( 'ABSPATH' ) or die();

/*------------------------------------*\
	Create Custom Post Types
\*------------------------------------*/
add_action('init', 'project_post_type');
function project_post_type() {
    register_post_type('Project', array(
        'labels' => array(
            'name' => __('Projects', 'mkoneprojects'),
            'singular_name' => __('Project', 'mkoneprojects'),
            'add_new' => __('Add New', 'mkoneprojects'),
            'add_new_item' => __('Add New Project', 'mkoneprojects'),
            'edit_item' => __('Edit Project', 'mkoneprojects'),
            'new_item' => __('New Project', 'mkoneprojects'),
            'view_item' => __('View Project', 'mkoneprojects'),
            'view_items' => __('View projects', 'mkoneprojects'),
            'search_items' => __('Search projects', 'mkoneprojects'),
            'not_found' => __('No projects found.', 'mkoneprojects'),
            'not_found_in_trash' => __('No projects found in trash.', 'mkoneprojects'),
            'all_items' => __('All projects', 'mkoneprojects'),
            'archives' => __('Project Archives', 'mkoneprojects'),
            'insert_into_item' => __('Insert into Project', 'mkoneprojects'),
            'uploaded_to_this_item' => __('Uploaded to this Project', 'mkoneprojects'),
            'filter_items_list' => __('Filter projects list', 'mkoneprojects'),
            'items_list_navigation' => __('projects list navigation', 'mkoneprojects'),
            'items_list' => __('projects list', 'mkoneprojects'),
            'item_published' => __('Project published.', 'mkoneprojects'),
            'item_published_privately' => __('Project published privately.', 'mkoneprojects'),
            'item_reverted_to_draft' => __('Project reverted to draft.', 'mkoneprojects'),
            'item_scheduled' => __('Project scheduled.', 'mkoneprojects'),
            'item_updated' => __('Project updated.', 'mkoneprojects')
        ),
        'has_archive'   => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'revisions'),
        'can_export' => true
    ));
}

/* Assign custom template to project post type*/
function load_project_template( $template ) {
    global $post;
    if ( 'project' === $post->post_type && locate_template( array( 'single-project.php' ) ) !== $template ) {
        return plugin_dir_path( __FILE__ ) . 'single-project.php';
    }

    return $template;
}

add_filter( 'single_template', 'load_project_template' );