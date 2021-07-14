# No Text Image!

This WordPress plugin scans images when they are uploaded to the media library. If text is detected in the image, the content editor will be given a stern lecture about why text in images is bad.



## Tesseract OCR

The Tesseract OCR library is the best match for this plugin, but it requires that the library be directly installed onto the server. While this is not something that one can reasonably expect an end-user to have the ability and/or access to do, this is the OCR that works and remains free.

### Base library installation

There are [instructions in the package's README](https://github.com/thiagoalessio/tesseract-ocr-for-php) on how to install the base OCR library, but here is what I did:

1. Install tesseract on the local machine: `brew install tesseract tesseract-lang`
1. Figure out where it was installed. In my case, it is in `/usr/local/Cellar/tesseract/4.1.1/bin/tesseract`.

### PHP wrapper

The [Tesseract OCR wrapper for PHP](https://github.com/thiagoalessio/tesseract-ocr-for-php) is included in the plugin via Composer. It works with Tesseract OCR and PHP to provide an API to use within Wordpress. This still requires Tesseract OCR to be installed on your base system / server.

### Additional references

* [WP Tesseract plugin](https://wordpress.org/plugins/wp-tesseract/)
* [Tesseract OCR for PHP API documentation](https://github.com/thiagoalessio/tesseract-ocr-for-php#api)
* [Tesseract command line usage](https://tesseract-ocr.github.io/tessdoc/Command-Line-Usage.html#simplest-invocation-to-ocr-an-image)



## Rejected OCR libraries

At least the serious contenders. There are [a lot](https://packagist.org/?query=ocr), many in (spoken) languages I cannot read.

### Google Cloud Vision

Google Cloud Vision looks promising, but requires registration of a project and service account, so you can get keys to access the API. After that, they only allow 1000 calls to the Vision API per month before they charge your account, which is not great for large scale projects that can't spend money.

* [Cloud Vision Composer package](https://packagist.org/packages/google/cloud-vision)
* [Google Cloud Vision API](http://googleapis.github.io/google-cloud-php/#/docs/cloud-vision/v1.3.3/vision/image)

### PHP OCR

PHP OCR is a very small library that states upfront it is best on very small images. It is correct. It throws "out of memory" issues on most images that would reasonably go into the Media Library.

* [PHP OCR Composer package](https://packagist.org/packages/bpteam/php-ocr)

### Evernote OCR

Evernote OCR would have been a nice thought, but it is a violation of their API License Agreement to use the API outside the context of the Evernote app (which this plugin certainly is). Oh well.

* [Evernote OCR Composer package](https://packagist.org/packages/estey/evernote-ocr)
* [Evernote API License Agreement](https://dev.evernote.com/doc/reference/api_license.php)



## To Do List

* Make it so a notice appears when an image has text, not just reject the image outright. Rejecting was easier in the short term, because it seems that admin notices are not available to the Media Uploader / Library / post editor? Needs more research.
* Find a better OCR reader. Tesseract definitely detects that there is text in the image, but the text it finds is highly inaccurate.
* Check for existing images with text when they are added to a page. See [image_send_to_editor filter](https://wordpress.stackexchange.com/questions/224633/which-hook-is-fired-when-inserting-media-into-a-post)
