<?php

class MessageBuilder{
    //digunakan untuk membalas pesan dengan berbagai type
    //KostLab
    
    
    public function reply($replyToken,$array){//Fungsi utama
        $reply=array('replyToken'=>$replyToken,'messages'=>$array);
        return $reply;
    }
    
    public function text($string){
        $typeMessage=array(
                    'type' => 'text',
                    'text' => $string
                );
        return $typeMessage;
    }
    public function sticker($string){
        $typeMessage=array(
                    'type' => 'sticker',
                    'stickerid' => $string
                );
        return $typeMessage;
    }
    public function audio($url){
        $typeMessage=array(
              'type' => 'audio',
              'originalContentUrl' => $url,
              'duration' => 240000,
              );
        return $typeMessage;
    }
    
    public function flex($alt,$content){
        $typeMessage=array(
            'type'=>'flex',
            'altText'=>$alt,
            'contents'=>$content
              );
        return $typeMessage;
    }
    
    public function image($url){
        $typeMessage=array(
                    'type' => 'image',
                    'originalContentUrl' => $url,
                    'previewImageUrl' =>$url
                );
        return $typeMessage;
    }
    
    public function video($urlVideo,$urlImage){
        $typeMessage=array(
                  'type' => 'video',
                  'originalContentUrl' => $urlVideo,
                  'previewImageUrl' =>$urlImage
              );
        return $typeMessage;
    }
    
    public function location($title,$address,$latitude,$longitude){
        $typeMessage=array(
              'type' => 'location',
              'title' => $title,
              'address' => $address,
              'latitude' => $latitude,
              'longitude' => $longitude,
              );
        return $typeMessage;
    }
    
    public function imagemap($baseUrl,$altText){
        $typeMessage=array(
                    'type' => 'imagemap',
                    'baseUrl' => $baseUrl,
                    'altText' => $altText,
                    'baseSize' =>
                    array (
                        'height' => 1040,
                        'width' => 1040,
                        ),
                        'actions' =>
                        array (
                            0 =>
                            array (
                                'type' => 'message',
                                'text' => '-',
                                'area' =>
                                array (
                                    'x' => 0,
                                    'y' => 0,
                                    'width' => 1,
                                    'height' => 1,
                                    ),
                                  ),
                               ),
                            );
      return $typeMessage;
    }
    
    public function imagemapurl($baseUrl,$altText,$url){
        $typeMessage=array(

                  'type' => 'imagemap',
                  'baseUrl' => $baseUrl,
                  'altText' => $altText,
                  'baseSize' =>
                  array (
                    'height' => 1040,
                    'width' => 1040,
                  ),
                  'actions' =>
                  array (
                    0 =>
                     array (
                      'type' => 'uri',
                      'linkUri' => $url,
                      'area' =>
                      array (
                        'x' => 0,
                        'y' => 0,
                        'width' => 1040,
                        'height' => 1040,
                      ),
                    ),
                    ),
                );
        return $typeMessage;
    }
    public function imagemaptext($baseUrl,$altText,$text){
        $typeMessage=array(

                  'type' => 'imagemap',
                  'baseUrl' => $baseUrl,
                  'altText' => $altText,
                  'baseSize' =>
                  array (
                    'height' => 1040,
                    'width' => 1040,
                  ),
                  'actions' =>
                  array (
                    0 =>
                     array (
                      'type' => 'message',
                      'text' => $text,
                      'area' =>
                      array (
                        'x' => 0,
                        'y' => 0,
                        'width' => 1040,
                        'height' => 1040,
                      ),
                    ),
                    ),
                );
        return $typeMessage;
    }
        
    public function imagemapmenu($baseUrl,$altText,$text1,$text2,$text3,$text4,$text5,$text6){
        $typeMessage=array (
          'type' => 'imagemap',
          'baseUrl' => $baseUrl,
          'altText' => $altText,
          'baseSize' => 
          array (
            'width' => 1040,
            'height' => 698,
          ),
          'actions' => 
          array (
            0 => 
            array (
              'type' => 'message',
              'area' => 
              array (
                'x' => 11,
                'y' => 100,
                'width' => 312,
                'height' => 245,
              ),
              'text' => $text1,
            ),
            1 => 
            array (
              'type' => 'message',
              'area' => 
              array (
                'x' => 351,
                'y' => 102,
                'width' => 333,
                'height' => 243,
              ),
              'text' => $text2,
            ),
            2 => 
            array (
              'type' => 'message',
              'area' => 
              array (
                'x' => 719,
                'y' => 106,
                'width' => 316,
                'height' => 236,
              ),
              'text' => $text3,
            ),
            3 => 
            array (
              'type' => 'message',
              'area' => 
              array (
                'x' => 5,
                'y' => 372,
                'width' => 325,
                'height' => 294,
              ),
              'text' => $text4,
            ),
            4 => 
            array (
              'type' => 'message',
              'area' => 
              array (
                'x' => 347,
                'y' => 374,
                'width' => 342,
                'height' => 287,
              ),
              'text' => $text5,
            ),
            5 => 
            array (
              'type' => 'message',
              'area' => 
              array (
                'x' => 710,
                'y' => 370,
                'width' => 325,
                'height' => 291,
              ),
              'text' => $text6,
            ),
          ),
        );
        return $typeMessage;
    }
    
    public function imagemapbahasa($baseUrl,$altText,$text,$text2){
        $typeMessage=array(

                  'type' => 'imagemap',
                  'baseUrl' => $baseUrl,
                  'altText' => $altText,
                  'baseSize' =>
                  array (
                    'height' => 520,
                    'width' => 1040,
                  ),
                  'actions' => 
                    array (
                      0 => 
                      array (
                        'type' => 'message',
                        'text' => $text,
                        'area' => 
                        array (
                          'x' => 62,
                          'y' => 115,
                          'width' => 366,
                          'height' => 382,
                        ),
                        'text' => $text,
                      ),
                      1 => 
                      array (
                        'type' => 'message',
                        'text' => $text2,
                        'area' => 
                        array (
                          'x' => 613,
                          'y' => 115,
                          'width' => 356,
                          'height' => 382,
                        ),
                      ),
                    ),
                );
        return $typeMessage;
    }
    public function imagemap2($baseUrl,$altText,$text1,$text2){
        $typeMessage=array (
                    'type' => 'imagemap',
                    'baseUrl' => $baseUrl,
                    'altText' => $altText,
                    'baseSize' => 
                    array (
                      'width' => 1040,
                      'height' => 522,
                    ),
                    'actions' => 
                    array (
                      0 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 28,
                          'y' => 95,
                          'width' => 478,
                          'height' => 409,
                        ),
                        'text' => $text1,
                      ),
                      1 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 534,
                          'y' => 99,
                          'width' => 495,
                          'height' => 407,
                        ),
                        'text' => $text2,
                      ),
                    ),
                  );
        return $typeMessage;
    }
    ///Template Message nya LINE
   
    public function imagemap5($baseUrl,$altText,$text1,$text2,$text3,$text4,$text5){
        $typeMessage=array (
                    'type' => 'imagemap',
                    'baseUrl' => $baseUrl,
                    'altText' => $altText,
                    'baseSize' => 
                    array (
                      'width' => 1040,
                      'height' => 695,
                    ),
                    'actions' => 
                    array (
                      0 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 19,
                          'y' => 88,
                          'width' => 305,
                          'height' => 256,
                        ),
                        'text' => $text1,
                      ),
                      1 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 356,
                          'y' => 90,
                          'width' => 326,
                          'height' => 255,
                        ),
                        'text' => $text2,
                      ),
                      2 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 717,
                          'y' => 95,
                          'width' => 314,
                          'height' => 245,
                        ),
                        'text' => $text3,
                      ),
                      3 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 16,
                          'y' => 370,
                          'width' => 493,
                          'height' => 286,
                        ),
                        'text' => $text4,
                      ),
                      4 => 
                      array (
                        'type' => 'message',
                        'area' => 
                        array (
                          'x' => 534,
                          'y' => 377,
                          'width' => 488,
                          'height' => 280,
                        ),
                        'text' => $text5,
                      ),
                    ),
                  );
        return $typeMessage;
    }
    ///Template Message nya LINE


    
    public function buttonMessage($imageUrl,$altText,$title,$text,$action){
        $typeMessage=array (
                  'type' => 'template',
                  'altText' => $altText,
                  'template' => 
                  array (
                    'type' => 'buttons',
                    'thumbnailImageUrl' => $imageUrl,
                    // 'imageAspectRatio' => 'rectangle',
                    // 'imageSize' => 'cover',
                    // 'imageBackgroundColor' => '#FFFFFF',
                    'title' => $title,
                    'text' => $text,
                    'actions' => $action,
                  ),
                );
        return $typeMessage;
    }
    
    public function confirmMessage($altText,$text,$action){
        $typeMessage=array (
              'type' => 'template',
              'altText' => $altText,
              'template' => 
              array (
                'type' => 'confirm',
                'text' => $text,
                'actions' => $action,
              ),
            );
        return $typeMessage;
    }
    //Carousel Message
    public function carouselMessage($altText,$columns){
        $typeMessage=array (
                  'type' => 'template',
                  'altText' => $altText,
                  'template' => 
                  array (
                    'type' => 'carousel',
                    'columns' => $columns,
                    // 'imageAspectRatio' => 'rectangle',
                    // 'imageSize' => 'cover',
                  ),
                );
        return $typeMessage;
    }
    
    public function itemCarousel($imgUrl,$title,$text,$buttons){
        $item=array (
                        'thumbnailImageUrl' => $imgUrl,
                        'title' => $title,
                        'text' => $text,
                        'actions' => $buttons,
                      );
        return $item;
    }
    //Carousel Message End
    //Image Carousel
    public function carouselImage($altText,$columns){
        $typeMessage=array (
  'type' => 'template',
  'altText' => $altText,
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => $columns
    ,
  ),
);
return $typeMessage;
    }
    
    public function itemImage($imgUrl,$button){
        $item=
      array (
        'imageUrl' => $imgUrl,
        'action' => $button,
      );
      return $item;
    
    }
    //Image Carousel END

    // QuickReply
    public function quickreply(){
        $item=array (
  'type' => 'text',
  'text' => 'Select your favorite food category or send me your location!',
  'quickReply' => 
  array (
    'items' => 
    array (
      0 => 
      array (
        'type' => 'action',
        'imageUrl' => 'https://example.com/sushi.png',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'Sushi',
          'text' => 'Sushi',
        ),
      ),
      1 => 
      array (
        'type' => 'action',
        'imageUrl' => 'https://example.com/tempura.png',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'Tempura',
          'text' => 'Tempura',
        ),
      ),
      2 => 
      array (
        'type' => 'action',
        'action' => 
        array (
          'type' => 'location',
          'label' => 'Send location',
        ),
      ),
    ),
  ),
);
      return $item;
    
    }
}

