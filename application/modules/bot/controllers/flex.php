<?php

class Flex extends MY_Controller{


 
public function __construct()
          {
            parent::__construct();
            //Codeigniter : Write Less Do More
      $this->load->model(array('Dbs'));

date_default_timezone_set("Asia/Bangkok");

          }
          
//hasil decode simpen di fungsi yang baru 
//contoh kaya gini
  
  function button($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $header,
        'align' => 'start',
        'wrap' => true,
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'YA',
          'text' => $message1,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'TIDAK',
          'text' => $message2,
        ),
        'color' => '#DFDFDF',
        'style' => 'secondary',
      ),
    ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);
return $item;  
  }
  
  function singlebutton($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $header,
        'align' => 'start',
        'wrap' => true,
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'YA',
          'text' => $message1,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
     ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);
return $item;  
  }

function singlebtn($header,$label,$message1){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $header,
        'align' => 'start',
        'wrap' => true,
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => $label,
          'text' => $message1,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
     ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);
return $item;  
  }

  
  function bunpou($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Pilih Level Bunpou',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'SEMUA',
          'text' => '/BUNPOUALL',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N5',
          'text' => '/BUNPOUN5',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N4',
          'text' => '/BUNPOUN4',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      3 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N3',
          'text' => '/BUNPOUN3',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      4 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N2',
          'text' => '/BUNPOUN2',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function padanan($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Pilih Level',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'SEMUA',
          'text' => '/INDOALL',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N5',
          'text' => '/INDON5',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N4',
          'text' => '/INDON4',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      3 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N3',
          'text' => '/INDON3',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      4 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N2',
          'text' => '/INDON2',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }

  function indexbunpou($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Pilih Level',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'SEMUA',
          'text' => '/INDEXJPALL',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N5',
          'text' => '/INDEXJP5',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N4',
          'text' => '/INDEXJP4',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      3 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N3',
          'text' => '/INDEXJP3',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      4 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N2',
          'text' => '/INDEXJP2',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function indexindo($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Pilih Level',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'SEMUA',
          'text' => '/INDEXIDALL',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N5',
          'text' => '/INDEXID5',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N4',
          'text' => '/INDEXID4',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      3 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N3',
          'text' => '/INDEXID3',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      4 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N2',
          'text' => '/INDEXID2',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function mode($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Pilih Mode',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'CARI DARI BAHASA INDONESIA',
          'text' => '/CARI-INDONESIA',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'CARI DARI BAHASA JEPANG',
          'text' => '/CARI-JEPANG',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'MENU UTAMA',
          'text' => '/MENU',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function backbutton($header){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'KEMBALI',
          'text' => '/BACK',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function score($score){
    $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'SCORE ANDA',
        'size' => 'xl',
        'align' => 'center',
        'weight' => 'bold',
        'color' => '#000000',
      ),
      1 => 
      array (
        'type' => 'text',
        'text' => $score,
        'flex' => 1,
        'size' => '5xl',
        'align' => 'center',
        'gravity' => 'top',
        'weight' => 'bold',
        'color' => '#FF7376',
      ),
    ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);

return $item;  //jangan lupa return variable item nya biar fungsi tadi menghasilkan nilai
}

function pilihlatihan($image,$tipe1,$tipe2){
    $item=
      array (
    'type' => 'bubble',
    'direction' => 'ltr',
    // 'hero' => 
    // array (
    //   'type' => 'image',
    //   'url' => $image,
    //   'size' => 'full',
    //   'aspectRatio' => '4:3',
    //   'aspectMode' => 'fit',
    // ),
    'footer' => 
    array (
      'type' => 'box',
      'layout' => 'horizontal',
      'spacing' => 'sm',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'button',
          'action' => 
          array (
            'type' => 'message',
            'label' => 'TIPE 1',
            'text' => $tipe1 ,
          ),
        'color' => '#FF7376',
          'style' => 'primary',
        ),
        1 => 
        array (
          'type' => 'button',
          'action' => 
          array (
            'type' => 'message',
            'label' => 'TIPE 2',
            'text' => $tipe2,
          ),
        'color' => '#FF7376',
           'style' => 'primary',
        ),
      ),
    ),
  );


    return $item;
}

function pillat ($level,$img,$aturan,$button1,$button2,$button3,$button4,$button5){
    $item=
    array (
    'type' => 'carousel',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Bagian satu',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button1,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /* /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      1 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Bagian dua',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button2,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ),
          ),
        ),
      ),
      2 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Bagian tiga',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button3,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /* /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      3 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Bagian empat',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button4,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      4 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Bagian lima',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button5,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
    ),
  );
    return $item;
}

public function latihan($nosoal, $soal, $pil_1, $pil_2, $pil_3, $pil_4) {
  $item = array(
      'type' => 'bubble',
      'styles' => array(
          'footer' => array(
              'separator' => true,
          ),
      ),
      'body' => array(
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'md',
          'contents' => array(
              0 => array(
                  'type' => 'box',
                  'layout' => 'vertical',
                  'contents' => array(
                      0 => array(
                          'type' => 'text',
                          'text' => '質問 ' . $nosoal,
                          'align' => 'center',
                          'size' => 'xxl',
                          'weight' => 'bold',
                      ),
                      1 => array(
                          'type' => 'text',
                          'text' => $soal,
                          'wrap' => true,
                          'weight' => 'bold',
                          'margin' => 'lg',
                      ),
                  ),
              ),
              1 => array(
                  'type' => 'separator',
              ),
              2 => array(
                  'type' => 'box',
                  'layout' => 'vertical',
                  'margin' => 'lg',
                  'contents' => array(
                      0 => array(
                          'type' => 'box',
                          'layout' => 'baseline',
                          'contents' => array(
                              0 => array(
                                  'type' => 'text',
                                  'text' => '1.',
                                  'flex' => 1,
                                  'size' => 'lg',
                                  'weight' => 'bold',
                                  'color' => '#666666',
                              ),
                              1 => array(
                                  'type' => 'text',
                                  'text' => $pil_1,
                                  'wrap' => true,
                                  'flex' => 9,
                              ),
                          ),
                      ),
                      1 => array(
                          'type' => 'box',
                          'layout' => 'baseline',
                          'contents' => array(
                              0 => array(
                                  'type' => 'text',
                                  'text' => '2.',
                                  'flex' => 1,
                                  'size' => 'lg',
                                  'weight' => 'bold',
                                  'color' => '#666666',
                              ),
                              1 => array(
                                  'type' => 'text',
                                  'text' => $pil_2,
                                  'wrap' => true,
                                  'flex' => 9,
                              ),
                          ),
                      ),
                      2 => array(
                          'type' => 'box',
                          'layout' => 'baseline',
                          'contents' => array(
                              0 => array(
                                  'type' => 'text',
                                  'text' => '3.',
                                  'flex' => 1,
                                  'size' => 'lg',
                                  'weight' => 'bold',
                                  'color' => '#666666',
                              ),
                              1 => array(
                                  'type' => 'text',
                                  'text' => $pil_3,
                                  'wrap' => true,
                                  'flex' => 9,
                              ),
                          ),
                      ),
                      3 => array(
                          'type' => 'box',
                          'layout' => 'baseline',
                          'contents' => array(
                              0 => array(
                                  'type' => 'text',
                                  'text' => '4.',
                                  'flex' => 1,
                                  'size' => 'lg',
                                  'weight' => 'bold',
                                  'color' => '#666666',
                              ),
                              1 => array(
                                  'type' => 'text',
                                  'text' => $pil_4,
                                  'wrap' => true,
                                  'flex' => 9,
                              ),
                          ),
                      ),
                  ),
              ),
          ),
      ),
      'footer' => array(
          'type' => 'box',
          'layout' => 'horizontal',
          'spacing' => 'sm',
          'contents' => array(
              0 => array(
                  'type' => 'button',
                  'style' => 'primary',
                  'color' => '#FF7376',
                  'height' => 'sm',
                  'action' => array(
                      'type' => 'message',
                      'label' => $pil_1,
                      'text' => $pil_1,
                  ),
              ),
              1 => array(
                  'type' => 'button',
                  'style' => 'primary',
                  'color' => '#FF7376',
                  'height' => 'sm',
                  'action' => array(
                      'type' => 'message',
                      'label' => $pil_2,
                      'text' => $pil_2,
                  ),
              ),
              2 => array(
                  'type' => 'button',
                  'style' => 'primary',
                  'color' => '#FF7376',
                  'height' => 'sm',
                  'action' => array(
                      'type' => 'message',
                      'label' => $pil_3,
                      'text' => $pil_3,
                  ),
              ),
              3 => array(
                  'type' => 'button',
                  'style' => 'primary',
                  'color' => '#FF7376',
                  'height' => 'sm',
                  'action' => array(
                      'type' => 'message',
                      'label' => $pil_4,
                      'text' => $pil_4,
                  ),
              ),
          ),
      ),
      'styles' => array(
          'header' => array(
              'backgroundColor' => '#FFFFFF',
          ),
          'body' => array(
              'backgroundColor' => '#FFFFFF',
          ),
          'footer' => array(
              'backgroundColor' => '#FFFFFF',
          ),
      ),
  );
  
  return $item;
}

    
function carouselflex ($contents){
    $item=
    array (
    'type' => 'carousel',
    'contents' => $contents
    );
return $item;
}

function help($url,$msg){
$item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'hero' => 
  array (
    'type' => 'image',
    'url' => $url,
    'size' => 'full',
    'aspectRatio' => '1:1',
    'aspectMode' => 'cover',
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'separator',
        'margin' => 'md',
        'color' => '#D4D4D4',
      ),
      1 => 
      array (
        'type' => 'spacer',
        'size' => 'xs',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'LIHAT',
          'text' => $msg,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;
}

function bantu($url){
   $item=
  array (
    'type' => 'bubble',
    'direction' => 'ltr',
    'hero' => 
    array (
      'type' => 'image',
      'url' => $url,
      'size' => 'full',
      'aspectRatio' => '9:16',
      'aspectMode' => 'cover',
    ),
  );
  return $item;
}


function leaderboard() { 
  $hasil = $this->Dbs->leaderboard()->result();
  foreach ($hasil as $h) {
    $nama=$h->nama;
    $score=$h->totalscore;
    
    $itemskor=array (
            'type' => 'box',
            'layout' => 'baseline',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => '1',
                'flex' => 1,
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => $nama,
                'flex' => 6,
                'wrap' => true,
              ),
              2 => 
              array (
                'type' => 'text',
                'text' => $score,
                'flex' => 3,
              ),
            ),
          );

    }
  
  $item = array (
    'type' => 'bubble',
    'direction' => 'ltr',
    'hero' => 
    array (
      'type' => 'image',
      'url' => 'https://developers.line.biz/assets/images/services/bot-designer-icon.png',
      'size' => 'full',
      'aspectRatio' => '1.51:1',
      'aspectMode' => 'fit',
    ),
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'box',
          'layout' => 'baseline',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => '#',
              'flex' => 1,
              'weight' => 'bold',
            ),
            1 => 
            array (
              'type' => 'text',
              'text' => 'Nama',
              'flex' => 6,
              'weight' => 'bold',
            ),
            2 => 
            array (
              'type' => 'text',
              'text' => 'Score',
              'flex' => 3,
              'weight' => 'bold',
            ),
          ),
        ),
        1 => 
        array (
          'type' => 'separator',
          'margin' => 'sm',
        ),
        $itemskor
                   
      ),
    ),
  );

  return $item; //jangan lupa return variable item nya biar fungsi tadi menghasilkan nilai
    
  }



   function kanatable ($kana,$imgurl,$romaji,$exk,$exr,$exm,$exk2,$exr2,$exm2,$exk3,$exr3,$exm3,$exk4,$exr4,$exm4,$exk5,$exr5,$exm5){
  	$item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $kana,
        'size' => '4xl',
        'align' => 'center',
        'weight' => 'bold',
      ),
    ),
  ),
  'hero' => 
  array (
    'type' => 'image',
    'url' => $imgurl,
    'size' => 'full',
    'aspectRatio' => '3:1',
    'aspectMode' => 'fit',
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $kana,
            'flex' => 4,
            'size' => 'xxl',
            'align' => 'center',
            'weight' => 'bold',
          ),
          1 => 
          array (
            'type' => 'separator',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $romaji,
            'flex' => 4,
            'size' => 'xxl',
            'align' => 'center',
            'weight' => 'bold',
          ),
        ),
      ),
      1 => 
      array (
        'type' => 'text',
        'text' => 'Contoh',
        'margin' => 'md',
        'align' => 'center',
      ),
      2 => 
      array (
        'type' => 'separator',
        'margin' => 'sm',
      ),
      3 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'flex' => 4,
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $exk,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          1 => 
          array (
            'type' => 'separator',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $exr,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          3 => 
          array (
            'type' => 'separator',
          ),
          4 => 
          array (
            'type' => 'text',
            'text' => $exm,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
        ),
      ),
      4 => 
      array (
        'type' => 'separator',
      ),
      5 => 
      array (
        'type' => 'separator',
      ),
      6 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'flex' => 4,
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $exk2,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          1 => 
          array (
            'type' => 'separator',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $exr2,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          3 => 
          array (
            'type' => 'separator',
          ),
          4 => 
          array (
            'type' => 'text',
            'text' => $exm2,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
        ),
      ),
      7 => 
      array (
        'type' => 'separator',
      ),
      8 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'flex' => 4,
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $exk3,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          1 => 
          array (
            'type' => 'separator',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $exr3,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          3 => 
          array (
            'type' => 'separator',
          ),
          4 => 
          array (
            'type' => 'text',
            'text' => $exm3,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
        ),
      ),
      9 => 
      array (
        'type' => 'separator',
      ),
      10 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'flex' => 4,
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $exk4,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          1 => 
          array (
            'type' => 'separator',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $exr4,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          3 => 
          array (
            'type' => 'separator',
          ),
          4 => 
          array (
            'type' => 'text',
            'text' => $exm4,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
        ),
      ),
      11 => 
      array (
        'type' => 'separator',
      ),
      12 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'flex' => 4,
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $exk5,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          1 => 
          array (
            'type' => 'separator',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $exr5,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
          3 => 
          array (
            'type' => 'separator',
          ),
          4 => 
          array (
            'type' => 'text',
            'text' => $exm5,
            'flex' => 4,
            'size' => 'xs',
            'align' => 'center',
            'gravity' => 'center',
          ),
        ),
      ),
      13 => 
      array (
        'type' => 'separator',
      ),
    ),
  ),
);
  	return $item;
  }


  //ENGLISH FLEX
  function buttonen($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $header,
        'align' => 'start',
        'wrap' => true,
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'YES',
          'text' => $message1,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'NO',
          'text' => $message2,
        ),
        'color' => '#DFDFDF',
        'style' => 'secondary',
      ),
    ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);
return $item;  
  }
  
  function bunpouen ($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Choose Bunpou Level',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'ALL',
          'text' => '/BUNPOUALL',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N5',
          'text' => '/BUNPOUN5',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N4',
          'text' => '/BUNPOUN4',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function padananen($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Choose Level',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'ALL LEVEL',
          'text' => '/ENALL',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N5',
          'text' => '/ENN5',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'N4',
          'text' => '/ENN4',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function modeen($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Choose Mode',
        'size' => 'lg',
        'align' => 'center',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'JP>EN',
          'text' => '/JP>EN',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      1 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'EN>JP',
          'text' => '/EN>JP',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
      2 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'MAIN MENU',
          'text' => '/MENU',
        ),
        'margin' => 'sm',
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function backbuttonen($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'BACK',
          'text' => '/BACK',
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;  
  }
  
  function scoreen($score){
    $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'YOUR SCORE',
        'size' => 'xl',
        'align' => 'center',
        'weight' => 'bold',
        'color' => '#000000',
      ),
      1 => 
      array (
        'type' => 'text',
        'text' => $score,
        'flex' => 1,
        'size' => '5xl',
        'align' => 'center',
        'gravity' => 'top',
        'weight' => 'bold',
        'color' => '#FF7376',
      ),
    ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);

return $item;  //jangan lupa return variable item nya biar fungsi tadi menghasilkan nilai
}


function pillaten ($level,$img,$aturan,$button1,$button2,$button3,$button4,$button5){
    $item=
    array (
    'type' => 'carousel',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Part 1',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button1,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      1 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Part 2',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button2,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      2 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Part 3',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button3,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      3 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
         /*'hero' => 
        array (
          'type' => 'image',
          'url' => $img,
          'size' => 'full',
          'aspectRatio' => '4:3',
          'aspectMode' => 'fit',
        ),*/
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Part 4',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button4,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
      4 => 
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $level,
              'align' => 'center',
              'weight' => 'bold',
            ),
          ),
        ),
        // 'hero' => 
        // array (
        //   'type' => 'image',
        //   'url' => $img,
        //   'size' => 'full',
        //   'aspectRatio' => '4:3',
        //   'aspectMode' => 'fit',
        // ),
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => 'Part 5',
              'size' => 'md',
              'align' => 'center',
            ),
            1 => 
            array (
              'type' => 'filler',
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'START',
                'text' => $button5,
              ),
              'color' => '#FF7376',
              'style' => 'primary',
            ), /*
            1 => 
            array (
              'type' => 'button',
              'action' => 
              array (
                'type' => 'message',
                'label' => 'SEE RULES',
                'text' => $aturan,
              ),
            ),*/
          ),
        ),
      ),
    ),
  );
    return $item;
}

function flexkamus($title,$imgurl,$desc,$label,$text,$label2,$text2,$label3,$text3){
  $item=array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => $title,
              'weight' => 'bold',
              'size' => 'xl',
              'align' => 'center',
              'contents' => 
              array (
              ),
            ),
          ),
        ),
        'hero' => 
        array (
          'type' => 'image',
          'url' => $imgurl,
          'size' => 'full',
          'aspectRatio' => '1.51:1',
          'aspectMode' => 'fit',
        ),
        'body' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'box',
              'layout' => 'vertical',
              'contents' => 
              array (
                0 => 
                array (
                  'type' => 'text',
                  'text' => $desc,
                  'align' => 'center',
                  'contents' => 
                  array (
                  ),
                ),
              ),
            ),
          ),
        ),
        'footer' => 
        array (
          'type' => 'box',
          'layout' => 'vertical',          
          'spacing' => 'sm',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' => 
              array (
                0 => 
                array (
                  'type' => 'button',
                  'action' => 
                  array (
                    'type' => 'message',
                    'label' => $label,
                    'text' => $text,
                  ),
                  'color' => '#FF7376',
                  'style' => 'primary',
                ),
              ),
            ),
            1 => 
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' => 
              array (
                0 => 
                array (
                  'type' => 'button',
                  'action' => 
                  array (
                    'type' => 'message',
                    'label' => $label2,
                    'text' => $text2,
                  ),
                  'color' => '#FF7376',
                  'style' => 'primary',
                ),
              ),
            ),
            2 => 
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' => 
              array (
                0 => 
                array (
                  'type' => 'button',
                  'action' => 
                  array (
                    'type' => 'message',
                    'label' => $label3,
                    'text' => $text3,
                  ),
                  'color' => '#FF7376',
                  'style' => 'primary',
                ),
              ),
            ),
           ),
        ),
      );

  return $item;


}

function latihanen($nosoal,$pilsoal,$pilgan1,$pilgan2,$pilgan3,$pilgan4,$jaw1,$jaw2,$jaw3,$jaw4){
  $item=array (
  'type' => 'bubble',
  'styles' => 
  array (
    'footer' => 
    array (
      'separator' => true,
    ),
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'spacing' => 'md',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => 'Q'.$nosoal,
            'align' => 'center',
            'size' => 'xxl',
            'weight' => 'bold',
          ),
          1 => 
          array (
            'type' => 'text',
            'text' => $pilsoal,
            'wrap' => true,
            'weight' => 'bold',
            'margin' => 'lg',
          ),
        ),
      ),
      1 => 
      array (
        'type' => 'separator',
      ),
      2 => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'margin' => 'lg',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'box',
            'layout' => 'baseline',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => '1.',
                'flex' => 1,
                'size' => 'lg',
                'weight' => 'bold',
                'color' => '#666666',
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => $pilgan1,
                'wrap' => true,
                'flex' => 9,
              ),
            ),
          ),
          1 => 
          array (
            'type' => 'box',
            'layout' => 'baseline',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => '2.',
                'flex' => 1,
                'size' => 'lg',
                'weight' => 'bold',
                'color' => '#666666',
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => $pilgan2,
                'wrap' => true,
                'flex' => 9,
              ),
            ),
          ),
          2 => 
          array (
            'type' => 'box',
            'layout' => 'baseline',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => '3.',
                'flex' => 1,
                'size' => 'lg',
                'weight' => 'bold',
                'color' => '#666666',
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => $pilgan3,
                'wrap' => true,
                'flex' => 9,
              ),
            ),
          ),
          3 => 
          array (
            'type' => 'box',
            'layout' => 'baseline',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => '4.',
                'flex' => 1,
                'size' => 'lg',
                'weight' => 'bold',
                'color' => '#666666',
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => $pilgan4,
                'wrap' => true,
                'flex' => 9,
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'spacing' => 'sm',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'style' => 'primary',
        'color' => '#FF7376',
        'height' => 'sm',
        'action' => 
        array (
          'type' => 'message',
          'label' => '1',
          'text' => $jaw1,
        ),
      ),
      1 => 
      array (
        'type' => 'button',
        'style' => 'primary',
        'color' => '#FF7376',
        'height' => 'sm',
        'action' => 
        array (
          'type' => 'message',
          'label' => '2',
          'text' => $jaw2,
        ),
      ),
      2 => 
      array (
        'type' => 'button',
        'style' => 'primary',
        'color' => '#FF7376',
        'height' => 'sm',
        'action' => 
        array (
          'type' => 'message',
          'label' => '3',
          'text' => $jaw3,
        ),
      ),
      3 => 
      array (
        'type' => 'button',
        'style' => 'primary',
        'color' => '#FF7376',
        'height' => 'sm',
        'action' => 
        array (
          'type' => 'message',
          'label' => '4',
          'text' => $jaw4,
        ),
      ),
    ),
  ),
  'styles' => 
  array (
     'header' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);
return $item;  //jangan lupa return variable item nya biar fungsi tadi menghasilkan nilai
  }
    
function singlebuttonen($header,$message1,$message2){
      $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $header,
        'align' => 'start',
        'wrap' => true,
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'YES',
          'text' => $message1,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
     ),
  ),
  'styles' => 
  array (
    'body' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
    'footer' => 
    array (
      'backgroundColor' => '#FFFFFF',
    ),
  ),
);
return $item;  
  }


function helpen($url,$msg){
$item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'hero' => 
  array (
    'type' => 'image',
    'url' => $url,
    'size' => 'full',
    'aspectRatio' => '1:1',
    'aspectMode' => 'cover',
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'separator',
        'margin' => 'md',
        'color' => '#D4D4D4',
      ),
      1 => 
      array (
        'type' => 'spacer',
        'size' => 'xs',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => 'LOOK AT',
          'text' => $msg,
        ),
        'color' => '#FF7376',
        'style' => 'primary',
      ),
    ),
  ),
);
return $item;
}

function pilihlatihanen($image,$tipe1,$tipe2){
    $item=
      array (
    'type' => 'bubble',
    'direction' => 'ltr',
    // 'hero' => 
    // array (
    //   'type' => 'image',
    //   'url' => $image,
    //   'size' => 'full',
    //   'aspectRatio' => '4:3',
    //   'aspectMode' => 'fit',
    // ),
    'footer' => 
    array (
      'type' => 'box',
      'layout' => 'horizontal',
      'spacing' => 'sm',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'button',
          'action' => 
          array (
            'type' => 'message',
            'label' => '1ST TYPE',
            'text' => $tipe1 ,
          ),
        'color' => '#FF7376',
          'style' => 'primary',
        ),
        1 => 
        array (
          'type' => 'button',
          'action' => 
          array (
            'type' => 'message',
            'label' => '2ND TYPE',
            'text' => $tipe2,
          ),
        'color' => '#FF7376',
           'style' => 'primary',
        ),
      ),
    ),
  );


    return $item;
}



//tabel kana
  

function hirakana(){
    $item=
      array (
  'type' => 'carousel',
  'contents' => 
  array (
    0 => 
    array (
      'type' => 'bubble',
      'direction' => 'ltr',
      'header' => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => 'TABEL HIRAGANA',
            'weight' => 'bold',
            'size' => 'xl',
            'color' => '#000000FF',
            'align' => 'center',
            'contents' => 
            array (
            ),
          ),
        ),
      ),
      'body' => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'spacing' => 'sm',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris あ | A',
                  'text' => '/HIRAGANA-A',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris か | KA',
                  'text' => '/HIRAGANA-KA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          1 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris さ | SA',
                  'text' => '/HIRAGANA-SA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris た | TA',
                  'text' => '/HIRAGANA-TA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          2 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris な | NA',
                  'text' => '/HIRAGANA-NA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris は | HA',
                  'text' => '/HIRAGANA-HA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          3 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ま | MAIN',
                  'text' => '/HIRAGANA-MA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris や | YA',
                  'text' => '/HIRAGANA-YA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          4 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ら | RA',
                  'text' => '/HIRAGANA-RA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris わ | WA',
                  'text' => '/HIRAGANA-N',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
        ),
      ),
    ),
    1 => 
    array (
      'type' => 'bubble',
      'direction' => 'ltr',
      'header' => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => 'TABEL KATAKANA',
            'weight' => 'bold',
            'size' => 'xl',
            'color' => '#000000FF',
            'align' => 'center',
            'contents' => 
            array (
            ),
          ),
        ),
      ),
      'body' => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'spacing' => 'sm',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ア | A',
                  'text' => '/KATAKANA-A',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris カ | KA',
                  'text' => '/KATAKANA-KA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          1 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris サ | SA',
                  'text' => '/KATAKANA-SA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris タ | TA',
                  'text' => '/KATAKANA-TA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          2 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ナ | NA',
                  'text' => '/KATAKANA-NA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ハ | HA',
                  'text' => '/KATAKANA-HA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          3 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris マ | MA',
                  'text' => '/KATAKANA-MA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ヤ | YA',
                  'text' => '/KATAKANA-YA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
          4 => 
          array (
            'type' => 'box',
            'layout' => 'horizontal',
            'spacing' => 'sm',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ラ | RA',
                  'text' => '/KATAKANA-RA',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
              1 => 
              array (
                'type' => 'button',
                'action' => 
                array (
                  'type' => 'message',
                  'label' => 'Baris ワ | WA',
                  'text' => '/KATAKANA-N',
                ),
                'color' => '#FF7376',
                'style' => 'primary',
              ),
            ),
          ),
        ),
      ),
    ),
  ),
);

    return $item;
}


function aisatsu($title,$img,$ungkapan,$carabaca,$arti,$keterangan) {
$item = array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $title,
        'weight' => 'bold',
        'size' => 'xxl',
        'align' => 'center',
        'contents' => 
        array (
        ),
      ),
    ),
  ),
  'hero' => 
  array (
    'type' => 'image',
    'url' => $img,
    'size' => 'full',
    'aspectRatio' => '1.51:1',
    'aspectMode' => 'fit',
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'box',
        'layout' => 'vertical',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $ungkapan,
            'weight' => 'bold',
            'align' => 'center',
            'contents' => 
            array (
            ),
          ),
          1 => 
          array (
            'type' => 'separator',
            'margin' => 'sm',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $carabaca,
            'weight' => 'bold',
            'align' => 'center',
            'contents' => 
            array (
            ),
          ),
          3 => 
          array (
            'type' => 'separator',
            'margin' => 'sm',
          ),
          4 => 
      array (
        'type' => 'text',
        'text' => $arti,
        'weight' => 'bold',
        'align' => 'center',
        'wrap' => true,
        'contents' => 
        array (
        ),
      ),
      5 => 
      array (
        'type' => 'separator',
        'margin' => 'sm',
      ),
      6 => 
      array (
        'type' => 'text',
        'text' => $keterangan,
        'align' => 'center',
        'wrap' => true,
        'contents' => 
        array (
        ),
      ),
        ),
      ),
    ),
  ),
);



  return $item;
}

function indexflex($title,$label,$text){
    $data = $this->Dbs->getdata_kamusengineer()->result();
    foreach ($data as $d) {
        $dariindo=$d->dariindo;
        $bajep=$d->bajep;
        $arraynumber= 0;

        $itemindeks[]=array (
            'type' => 'box',
            'layout' => 'vertical',
            'contents' => array (
                $arraynumber++ => array (
                    'type' => 'box',
                    'layout' => 'horizontal',
                    'contents' => array (
                        0 => array (
                            'type' => 'text',
                            'text' => $dariindo,
                            'align' => 'center',
                            'wrap' => true,
                            'gravity' => 'center',
                            'contents' => array (
                            ),
                        ),
                        1 => array (
                            'type' => 'separator',
                            'margin' => 'sm',
                            'color' => '#000000FF',
                        ),
                        2 => array (
                            'type' => 'text',
                            'text' => $bajep,
                            'align' => 'center',
                            'align' => 'center',
                            'wrap' => true,
                            'gravity' => 'center',
                            'contents' => 
                            array (
                            ),
                        ),
                    ),
                ),
            ),
        );
    }
    
    $item = array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' => array (
            'type' => 'box',
            'layout' => 'vertical',
            'contents' => array (
                0 => array (
                    'type' => 'text',
                    'text' => $title,
                    'weight' => 'bold',
                    'align' => 'center',
                    'wrap' => true,
                    'contents' => 
                    array (
                    ),
                ),
            ),
        ),
        'body' => $itemindeks,
        'footer' => array (
            'type' => 'box',
            'layout' => 'horizontal',
            'contents' => array (
                0 => array (
                    'type' => 'button',
                    'action' => array (
                        'type' => 'message',
                        'label' => $label,
                        'text' => $text,
                    ),
                    'style' => 'primary',
                ),
            ),
        ),
    );

    return $item;

}

function cobaindexkamus($title,$dariindo,$bajep,$label,$text) {
  $item=array (
  'type' => 'bubble',
  'direction' => 'ltr',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => $title,
        'weight' => 'bold',
        'align' => 'center',
        'wrap' => true,
        'contents' => 
        array (
        ),
      ),
    ),
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'box',
        'layout' => 'horizontal',
        'contents' => 
        array (
          0 => 
          array (
            'type' => 'text',
            'text' => $dariindo,
            'align' => 'center',
            'gravity' => 'top',
            'wrap' => true,
            'contents' => 
            array (
            ),
          ),
          1 => 
          array (
            'type' => 'separator',
            'margin' => 'sm',
            'color' => '#000000FF',
          ),
          2 => 
          array (
            'type' => 'text',
            'text' => $bajep,
            'align' => 'center',
            'gravity' => 'top',
            'wrap' => true,
            'contents' => 
            array (
            ),
          ),
        ),
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'horizontal',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'button',
        'action' => 
        array (
          'type' => 'message',
          'label' => $label,
          'text' => $text,
        ),
        'style' => 'primary',
      ),
    ),
  ),
);

  return $item;


}

function leaderboarden() { 
  $hasil = $this->Dbs->leaderboard()->result();
  foreach ($hasil as $h) {
    $nama=$h->nama;
    $score=$h->totalscore;
    
    $itemskor=array (
            'type' => 'box',
            'layout' => 'baseline',
            'contents' => 
            array (
              0 => 
              array (
                'type' => 'text',
                'text' => '1',
                'flex' => 1,
              ),
              1 => 
              array (
                'type' => 'text',
                'text' => $nama,
                'flex' => 6,
                'wrap' => true,
              ),
              2 => 
              array (
                'type' => 'text',
                'text' => $score,
                'flex' => 3,
              ),
            ),
          );

    }
  
  $item = array (
    'type' => 'bubble',
    'direction' => 'ltr',
    'hero' => 
    array (
      'type' => 'image',
      'url' => 'https://developers.line.biz/assets/images/services/bot-designer-icon.png',
      'size' => 'full',
      'aspectRatio' => '1.51:1',
      'aspectMode' => 'fit',
    ),
    'body' => 
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' => 
      array (
        0 => 
        array (
          'type' => 'box',
          'layout' => 'baseline',
          'contents' => 
          array (
            0 => 
            array (
              'type' => 'text',
              'text' => '#',
              'flex' => 1,
              'weight' => 'bold',
            ),
            1 => 
            array (
              'type' => 'text',
              'text' => 'Nama',
              'flex' => 6,
              'weight' => 'bold',
            ),
            2 => 
            array (
              'type' => 'text',
              'text' => 'Score',
              'flex' => 3,
              'weight' => 'bold',
            ),
          ),
        ),
        1 => 
        array (
          'type' => 'separator',
          'margin' => 'sm',
        ),
        $itemskor
                   
      ),
    ),
  );

  return $item; //jangan lupa return variable item nya biar fungsi tadi menghasilkan nilai
    
  }

  
}


