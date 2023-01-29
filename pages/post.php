<?php

    $post = Post::getPostByID( $_GET['id'] );

    require dirname(__DIR__) . '/parts/header.php';
?>
<div class="container mx-auto my-5" style="max-width: 500px;">
    <h1 class="h1 mb-4 text-center"><?php echo $post['title']; ?></h1>
    <?php
        // Auto method
        echo nl2br( $post['content'] );

        // Manual method
        // // step 1: split the content by breakline
        // $paragraphs = preg_split( '/\n\s*\n/', $post['content'] );

        // // step 2: echo out each paragraph using <p>
        // foreach( $paragraphs as $string )
        // {
        //     echo '<p>';
            
        //     // step 3: break it up by single breakline
        //     $lines = preg_split( '/\n/', $string );
        //     foreach( $lines as $line )
        //     {
        //       echo $line . '<br />';
        //     }

        //     echo '</p>';
        // }
    ?>
    <div class="text-center mt-3">
        <a href="/" class="btn btn-link btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>
<?php
    
    require dirname(__DIR__) . '/parts/footer.php';