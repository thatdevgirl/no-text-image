<?php

namespace ThreePM\NoTextImage;

use thiagoalessio\TesseractOCR\TesseractOCR;

class ScanImages {

  /**
   * __construct()
   */
  public function __construct() {
    // add_filter( 'wp_handle_upload_prefilter', [ $this, 'scan' ] );
    add_action( 'add_attachment', [ $this, 'scan' ] );
  }


  /**
   * scan()
   *
   * Scan images for text on media save/upload.
   *
   * @param string $post_id
   * @return void
   */
  function scan( string $post_id ): void {
    if ( wp_attachment_is_image( $post_id ) ) {
      // Get the post (image) based on the passed-in ID.
      $post = get_post( $post_id );
      error_log( print_r( $post, TRUE ) );
      error_log( print_r( ( new TesseractOCR( $post->guid ) )->executable('/usr/local/Cellar/tesseract/4.1.1/bin/tesseract')->run(), TRUE ) );

    }
  }

}

new ScanImages;
