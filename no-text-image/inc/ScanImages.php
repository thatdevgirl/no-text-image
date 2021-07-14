<?php

namespace ThreePM\NoTextImage;

use thiagoalessio\TesseractOCR\TesseractOCR;

class ScanImages {

  /**
   * __construct()
   */
  public function __construct() {
    add_filter( 'wp_handle_upload_prefilter', [ $this, 'scan_image' ] );
    // add_action( 'admin_notices', [ $this, 'upload_notice' ] );
  }


  /**
   * scan_image()
   *
   * Scan the passed-in image for text, called when an image is uploaded to
   * the media library.
   *
   * @param array $file
   * @return void
   */
  public function scan_image( $file ) {
    // If the file is not valid, just return whatever was passed in.
    if ( $file['error'] || !$file ) { return $file; }

    // Run the OCR on the generated image.
    $text = ( new TesseractOCR( $file['tmp_name'] ) )->executable('/usr/local/Cellar/tesseract/4.1.1/bin/tesseract')->run();

    // If text is found, yell at the user.
    if ( $text ) {
      $file['error'] = 'Your image has been rejected because it contains text, which is inaccessible. Please rethink your image and try again.';
    }

    return $file;
  }

}

new ScanImages;
