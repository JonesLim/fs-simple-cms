<?php

class Post
{
     /**
     * Retrieve all posts from database
     */
    public static function getAllPosts( $user_id )
    {
        // if is a normal user
        if ( Authentication::isUser() ) {
            return DB::connect()->select(
                'SELECT * FROM posts WHERE id = :id ORDER BY id DESC',
                [
                    'id' => $user_id
                ],
                true
            );
        }
        return DB::connect()->select(
            'SELECT * FROM posts ORDER BY id DESC',
            [],
            true
        );
    }

    /**
     * Retrieve post data by id
     */
    public static function getPostByID( $post_id )
    {
        return DB::connect()->select(
            'SELECT * FROM posts WHERE id = :id',
            [
                'id' => $post_id
            ]
        );
    }

    /**
     * Retrieve all the publish posts
     */
    public static function getPublishPosts()
    {
        return DB::connect()->select(
            'SELECT * FROM posts WHERE status = :status ORDER BY id DESC',
            [
                'status' => 'publish'
            ],
            true
        );
    }

    /**
     * Add new post
     */
    public static function add( $title, $content, $user_id )
    {
        return DB::connect()->insert(
            'INSERT INTO posts (title , content, user_id) 
            VALUES (:title, :content, :user_id)',
            [
                'title' => $title,
                'content' => $content,
                'user_id' => $user_id
            ]
        );
    }

    /**
     * Update Post details
     */
    public static function update( $id, $title, $content, $status )
    {

        // update user data into the database
        return DB::connect()->update(
            'UPDATE posts SET 
            title = :title, content = :content, status = :status 
            WHERE id = :id',
            [
                'id' => $id,
                'title' => $title,
                'content' => $content,
                'status' => $status
            ]
        );
    }

    /**
     * Delete post
     */
    public static function delete( $post_id )
    {
        return DB::connect()->delete(
            'DELETE FROM posts where id = :id',
            [
                'id' => $post_id
            ]
        );
    }
}