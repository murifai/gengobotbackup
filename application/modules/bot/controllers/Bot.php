<?php
defined("BASEPATH") or exit("No direct script access allowed");
require_once "line_class.php";
require_once "class/MessageBuilder.php";
require_once "class/Register.php";
require_once "quiz.php";



class Bot extends MY_Controller
{
    private $quizModule;

    public function __construct() {
        parent::__construct();
        $this->load->model('bot/Dbs');
        date_default_timezone_set("Asia/Bangkok");
        $this->load->library('session');
        $this->quizModule = new QuizModule($this->session->userdata('user_id'));
    }
    public function index()
    {
        //Konfigurasi Chatbot
        $channelAccessToken =
            "hQWqXVPFfRus5V3F29qTrm+7ccTpsMwBSQR/UR0u6ptO+8oIm4GEuWTC016Wc5l5422P4lhLbxESYVc7JT/+ACsb4DhvmjKZmuwyNCOJI2yzl1C3yUbSdg0/xZ0G/rGVhI55RsWHAH/AvOpfDmEenwdB04t89/1O/w1cDnyilFU=";
        $channelSecret = "32559e9bf0301ff50b2a8e051defdc74"; //sesuaikan
        //Konfigurasi Chatbot END
        $client = new LINEBotTiny($channelAccessToken, $channelSecret);
        $send = new MessageBuilder();
        $reg = new Register();
        $userId = $client->parseEvents()[0]["source"]["userId"];
        $groupId = $client->parseEvents()[0]["source"]["groupId"];
        $replyToken = $client->parseEvents()[0]["replyToken"];
        $timestamp = $client->parseEvents()[0]["timestamp"];
        $message = $client->parseEvents()[0]["message"];
        $messageid = $client->parseEvents()[0]["message"]["id"];
        $profil = $client->profil($userId);
        $nama = $profil->displayName;
        $pesan_datang = $message["text"];
        $upPesan = strtoupper($pesan_datang);
        $pecahnama = explode(" ", $profil->displayName);
        $namapanggilan = $pecahnama[0];
        $event = $client->parseEvents()[0];
        $db = $this->Dbs->getdata(["userid" => $userId], "user")->row();
        $db2 = $this->Dbs->getdata(["userid" => $userId], "quiz")->row();
        function getRandom($length = 3)
        {
            $characters =
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $charactersLength = strlen($characters);
            $randomString = "";
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        // EVENT ADD
        if ($event["type"] == "follow") {
            $data = [
                "userid" => $userId,
                "name" => $nama,
            ];
            $sql = $this->Dbs->insert($data, "user");
            $data2 = [
                "userid" => $userId,
                "nama" => $nama,
            ];
            $sql2 = $this->Dbs->insert($data2, "quiz");
            if ($sql) {
                $messages = [];
                $msg1 = $send->text(
                    "Selamat Menggunakan Chatbot, Silahkan Pilih Fitur yang anda inginkan"
                );
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/MENUS",
                        "MENU UTAMA",
                        "/CARI-TATA-BAHASA",
                        "/INDEKS",
                        "/LATIHAN",
                        "/HURUF-JEPANG",
                        "/AISATSU",
                        "/KOSAKATA"
                    ),
                ];
                array_push($messages, $msg1, $ballons);
                $output = $send->reply($replyToken, $messages);
            } else {
                $messages = [];
                $msg1 = $send->text(
                    "Selamat Menggunakan Chatbot, Silahkan Pilih Fitur yang anda inginkan"
                );
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/MENUS",
                        "MENU UTAMA",
                        "/CARI-TATA-BAHASA",
                        "/INDEKS",
                        "/LATIHAN",
                        "/HURUF-JEPANG",
                        "/AISATSU",
                        "/KOSAKATA"
                    ),
                ];
                array_push($messages, $msg1, $ballons);
                $output = $send->reply($replyToken, $messages);
            }
        } //END EVENT ADD
        // CCOBACOBA
        if ($upPesan == "/AISATSU") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->aisatsu(
                "おはようございます！",
                "https://2.bp.blogspot.com/-d7wvDnB61sw/VRE4ViJgS8I/AAAAAAAAsVk/BbIz5VBIiNU/s800/aisatsu1_ohayou.png",
                "おはようございます",
                "Ohayougozaimasu",
                "Selamat Pagi",
                "Disampaikan ketika pagi hari, dan kadang diungkapkan ketika masuk kerja karena bernuansa semangat"
            );
            $content2 = $flex->aisatsu(
                "こんにちは！",
                "https://3.bp.blogspot.com/-es53QY7EPdE/VRE4Vh5HwjI/AAAAAAAAsVs/yMPCc6KUpZA/s800/aisatsu2_konnichiwa.png",
                "こんにちは",
                "Kon’nichiwa",
                "Selamat siang / Halo",
                "“Kon’nichiwa” diucapkan pada siang hari secara umum"
            );
            $content3 = $flex->aisatsu(
                "おやすみなさい",
                "https://1.bp.blogspot.com/-RcB0ba0Ya2M/URedA_93yaI/AAAAAAAAMW0/tR-lSEu_NKU/s1600/suimin_man.png",
                "おやすみなさい",
                " Oyasumi nasai",
                "Selamat tidur. / Selamat malam",
                "Ucapan “oyasumi nasai” digunakan saat ingin tidur, atau berpisah dengan lawan bicara pada malam hari. "
            );
            $content4 = $flex->aisatsu(
                " おつかれさまです！",
                "https://3.bp.blogspot.com/-NSZJ9dpdrJY/W3abnJe7zLI/AAAAAAABODE/OL2GraT5mvggHS3jua7LnLdWA-nJ0kkMQCLcBGAs/s800/ojigi_aisatsu_businesswoman.png",
                "おつかれさまです",
                "Otsukaresama desu",
                "Terima kasih atas usaha dan kerja keras Anda",
                "Ucapan ini digunakan untuk mengucapkan “selamat bekerja” kepada anggota kantor, rekan bisnis, dan seterusnya pada saat bekerja, atau ketika pulang kerja."
            );
            $content5 = $flex->aisatsu(
                "さようなら",
                "https://4.bp.blogspot.com/-q9Jj9Y2fZxM/VRE4WwZd9wI/AAAAAAAAsV4/qOo5C3fkd74/s800/aisatsu_sayounara.png",
                "さようなら",
                "Sayoonara",
                "Sampai jumpa lagi",
                "“Sayoonara” diucapkan untuk salam perpisahan, dan biasanya digunakan di sekolah (antara guru dengan murid), atau dalam lingkungan tetangga secara rutin setiap hari."
            );
            $content6 = $flex->aisatsu(
                "行ってきます, 行ってらしゃい",
                "https://4.bp.blogspot.com/-oW3Riz2oP6k/UnIDNbN-a-I/AAAAAAAAZ30/ryfpsJmHI1Q/s800/syufu_miokuri.png",
                "行ってきます, 行ってらしゃい",
                "Ittekimasu & itterasshai",
                "Saya Pergi,Silahkan pergi",
                "Ketika meninggalkan rumah atau kantor, kamu akan mengucapkan ittekimasu, yang arti harfiahnya adalah “aku akan pergi dan kembali”. Lalu dijawab oleh orang yang ada di situ dengan itterasshai, artinya “silakan pergi dan kembali”. Kata-kata ini diucapkan dalam percakapan sehari-hari, tetapi hanya di rumah atau di kantor."
            );
            $content7 = $flex->aisatsu(
                "ただいま, おかえり",
                "https://2.bp.blogspot.com/-71-euHjk1zQ/VnE3oRbQjgI/AAAAAAAA13o/1Qk4Yf6V5rI/s800/home_kitaku_man.png",
                "ただいま, おかえり",
                "Tadaima & okaeri",
                "Saya Pulang, Selamat Datang",
                "Sama seperti sebelumnya, kata-kata ini diucapkan ketika pulang ke rumah atau kembali ke kantor. Orang yang baru saja kembali mengucapkan tadaima, sementara orang yang ada di situ menyambutnya dengan ucapan okaeri atau okaerinasai yang artinya, “selamat datang kembali”."
            );
            $content8 = $flex->aisatsu(
                " ありがとうございます",
                "https://3.bp.blogspot.com/-nrwPWwcAaOA/VRE4WqEKBSI/AAAAAAAAsV0/8D61LcHzjAk/w1200-h630-p-k-no-nu/aisatsu_arigatou.png",
                " ありがとうございます",
                "Arigatoo gozai masu",
                "Terima kasih / Halo",
                "“Arigatoo gozai masu” digunakan untuk mengucapkan “terima kasih” secara umum dan secara sopan."
            );
            $content9 = $flex->aisatsu(
                "どういたしまして",
                "https://www.thaibeosensei.com/wp-content/uploads/2021/07/pose_enryo_woman.png",
                "どういたしまして",
                " Doo itashi mashite",
                "Sama-sama",
                "“Doo itashi-mashite” digunakan untuk menyatakan “terima kasih kembali” sebagai balasan dari “terima kasih”."
            );
            $content10 = $flex->aisatsu(
                "すみません！",
                "https://4.bp.blogspot.com/-daX8n1S0zMI/Vf-eju0WNCI/AAAAAAAAyQg/6yJAgWcyqIg/w1200-h630-p-k-no-nu/syazai_men.png",
                "すみません",
                "Sumi-masen",
                "Mohon Maaf",
                "“Sumi-masen” diucapkan untuk menyatakan “minta maaf”. Ucapan ini berbentuk sopan dan bersifat umum sehingga dapat digunakan kepada orang umum secara keseluruhan."
            );
            $content11 = $flex->aisatsu(
                "いただきます",
                "https://4.bp.blogspot.com/-Jv-7GaPYU6c/VfjT0Q-MxgI/AAAAAAAAx_c/uh75AuLQzLY/s800/kyusyoku_boy_girl.png",
                "いただきます",
                "Itadaki-masu",
                "Selamat makan",
                '"Itadaki-masu" diucapkan sebelum mulai makan (pas saat mulai makan) untuk menyatakan rasa terima kasih kepada seluruh pihak yang telah menyediakan makanan seperti petani, nelayan, pedagang, pemasak, penyedia, tuan rumah, tulang punggung keluarga, sampai bahan-bahan makanan yang telah menyumbangkan nyawanya. Secara harfiah, “Itadaki-masu” berarti “saya menerima”.'
            );
            $content12 = $flex->aisatsu(
                "ごちそうさまでした",
                "https://2.bp.blogspot.com/-zj_0VcFPbEs/Us_MMxdjcEI/AAAAAAAAdCg/yaxNAcPfjCU/s800/gochisousama_girl.png",
                "ごちそうさまでした",
                "Gochisoosama-deshita",
                "Terima kasih atas hidangannya",
                "“Gochisoosama-deshita” diucapkan setelah makan. Ucapan ini juga menyatakan rasa terima kasih kepada seluruh kalangan yang telah menyediakan hidangannya."
            );
            $contents = [
                $content1,
                $content2,
                $content3,
                $content4,
                $content5,
                $content6,
                $content7,
                $content8,
                $content9,
                $content10,
                $content11,
                $content12,
            ];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Aisatsu bahasa Jepang", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        // TABELKANA BEGIN
        if ($upPesan == "/HURUF-JEPANG") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->hirakana();
            $messages = [];
            $msg1 = $send->flex("Pilih Huruf", $content1);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //HIRAGANA
        //あ行
        if ($upPesan == "/HIRAGANA-A") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "あ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/a.png",
                "A",
                "あい",
                "ai",
                "Cinta",
                "あう",
                "au",
                "Bertemu",
                "あく",
                "aku",
                "Jahat",
                "あるく",
                "aruku",
                "Berjalan",
                "あまい",
                "amai",
                "Manis"
            );
            $content2 = $flex->kanatable(
                "い",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/I.png",
                "I",
                "いいえ",
                "iie",
                "Tidak",
                "いぬ",
                "inu",
                "Anjing",
                "いく",
                "iku",
                "Pergi",
                "いい",
                "ii",
                "Bagus",
                "いろ",
                "iro",
                "Warna"
            );
            $content3 = $flex->kanatable(
                "う",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/U.png",
                "U",
                "うまい",
                "umai",
                "Enak/Bagus",
                "うみ",
                "umi",
                "Laut",
                "うすい",
                "usui",
                "Tipis",
                "うつ",
                "utsu",
                "Memukul",
                "うんめい",
                "unmei",
                "Takdir"
            );
            $content4 = $flex->kanatable(
                "え",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/E.png",
                "E",
                "えいが",
                "eiga",
                "Film",
                "ええ",
                "ee",
                "Iya",
                "えんそう",
                "ensou",
                "Pagelaran",
                "えび",
                "ebi",
                "Udang",
                "えがお",
                "egao",
                "Senyum"
            );
            $content5 = $flex->kanatable(
                "お",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/O.png",
                "O",
                "おもい",
                "omoi",
                "Berat",
                "おおきい",
                "ookii",
                "Besar",
                "おんな",
                "onna",
                "Perempuan",
                "おととい",
                "ototoi",
                "Adik",
                "おに",
                "oni",
                "Iblis"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana あ、い、う、え、お", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //か行
        if ($upPesan == "/HIRAGANA-KA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "か",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/KA.png",
                "KA",
                "かい",
                "kai",
                "Kerang",
                "かう",
                "kau",
                "Beli",
                "かく",
                "kaku",
                "Menulis",
                "かき",
                "kaki",
                "Menulis",
                "かわい",
                "kawai",
                "Lucu"
            );
            $content2 = $flex->kanatable(
                "き",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/KI.png",
                "KI",
                "きいろ",
                "Kiiro",
                "Kuning",
                "きる",
                "Kiru",
                "Memotong",
                "きく",
                "Kiku",
                "Mendengar",
                "きます",
                "Kimasu",
                "Datang",
                "きみ",
                "Kimi",
                "Kamu"
            );
            $content3 = $flex->kanatable(
                "く",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/KU.png",
                "KU",
                "くも",
                "Kumo",
                "Awan",
                "くろい",
                "Kuroi",
                "Hitam",
                "くらい",
                "Kurai",
                "Gelap",
                "くむ",
                "Kumu",
                "Menyambungkan",
                "さく",
                "Saku",
                "Mekar"
            );
            $content4 = $flex->kanatable(
                "け",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/KE.png",
                "KE",
                "けいさつかん",
                "keisatsukan",
                "Polisi",
                "けいさんき",
                "kēsanki",
                "Kalkulator",
                "けさ",
                "kesa",
                "pagi ini",
                "けしゴム",
                "keshigomu",
                "penghapus",
                "けします",
                "keshimasu",
                "Menghapus"
            );
            $content5 = $flex->kanatable(
                "こ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/KO.png",
                "KO",
                "ことし",
                "kotoshi",
                "tahun ini",
                "こども",
                "kodomo",
                "anak",
                "こく",
                "koku",
                "Rangsangan",
                "こんげつ",
                "kongetsu",
                "bulan ini",
                "こんしゅう",
                "konshū",
                "minggu ini"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana か、き、く、け、こ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //さ行
        if ($upPesan == "/HIRAGANA-SA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "さ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/sa.png",
                "SA",
                "さんぽ",
                "sanpo",
                "Jalan-jalan",
                "さき",
                "saki",
                "Tadi",
                "さん",
                "san",
                "tiga",
                "さします",
                "sashimasu",
                "Titik",
                "さめ",
                "same",
                "hiu"
            );
            $content2 = $flex->kanatable(
                "し",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/shi.png",
                "SHI",
                "しかります",
                "shikarimasu",
                "Memarahi",
                "します",
                "shimasu",
                "Melakukan",
                "しります",
                "shirimasu",
                "tahu",
                "しめます",
                "shimemasu",
                "Dandan",
                "しつれいします",
                "shitsureishimasu",
                "Permisi"
            );
            $content3 = $flex->kanatable(
                "す",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/su.png",
                "SU",
                "すいます",
                "suimasu",
                "merokok",
                "すみます",
                "sumimasu",
                "Tinggal",
                "すわります",
                "suwarimasu",
                "duduk",
                "すき",
                "suki",
                "Suka",
                "すべて",
                "subete",
                "semua"
            );
            $content4 = $flex->kanatable(
                "せ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/se.png",
                "SE",
                "せんげつ",
                "sengetsu",
                "bulan lalu",
                "せんしゅう",
                "senshuu",
                "minggu lalu",
                "せんせい",
                "sensei",
                "guru",
                "せんたく",
                "sentaku",
                "Pilihan",
                "せんぱい",
                "senpai",
                "Senior"
            );
            $content5 = $flex->kanatable(
                "そ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/so.png",
                "SO",
                "そふ",
                "sofu",
                "kakek",
                "そぼ",
                "sobo",
                "nenek",
                "そら",
                "sora",
                "Langit",
                "そこ",
                "soko",
                "Di sana",
                "そっくり",
                "sokkuri",
                "Mirip"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana さ、し、す、せ、そ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //た行
        if ($upPesan == "/HIRAGANA-TA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "た",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/ta.png",
                "TA",
                "たちます",
                "tachimasu",
                "berdiri",
                "たっきゅう",
                "takkyū",
                "Tenis meja",
                "たべます",
                "tabemasu",
                "makan",
                "たべもの",
                "tabemono",
                "makanan",
                "たまご",
                "tamago",
                "telur"
            );
            $content2 = $flex->kanatable(
                "ち",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/chi.png",
                "CHI",
                "ちかてつ",
                "chikatetsu",
                "kereta bawah tanah",
                "ちち",
                "chichi",
                "ayah",
                "ちゅうごく",
                "Chūgoku",
                "Cina",
                "ちゅうごくご",
                "Chūgokugo",
                "Cina",
                "ちっぽけ",
                "chippoke",
                "Perasaan geli"
            );
            $content3 = $flex->kanatable(
                "つ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/tsu.png",
                "TSU",
                "つかいます",
                "tsukaimasu",
                "Menggunakan",
                "つくえ",
                "tsukue",
                "meja",
                "つくります",
                "tsukurimasu",
                "membuat",
                "つけます",
                "tsukemasu",
                "Disertakan",
                "つま",
                "tsuma",
                "istri"
            );
            $content4 = $flex->kanatable(
                "て",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/te.png",
                "TE",
                "てんいん",
                "tenin",
                "Staf",
                "てんさい",
                "tensai",
                "jenius",
                "てんき",
                "tenki",
                "cuaca",
                "じゃくてん",
                "jakuten",
                "Kelemahan",
                "てがみ",
                "tegami",
                "surat"
            );
            $content5 = $flex->kanatable(
                "と",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/to.png",
                "TO",
                "ともだち",
                "tomodachi",
                "teman",
                "とり",
                "tori",
                "burung",
                "とりにく",
                "toriniku",
                "daging ayam",
                "とります",
                "torimasu",
                "Mengambil",
                "とくい",
                "tokui",
                "pandai"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana た、ち、つ、て、と", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //な行
        if ($upPesan == "/HIRAGANA-NA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "な",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/na.png",
                "NA",
                "なきます",
                "nakimasu",
                "menangis",
                "なる",
                "naru",
                "Menjadi",
                "なつ",
                "natsu",
                "musim panas",
                "なな",
                "nana",
                "Tujuh",
                "ならいます",
                "naraimasu",
                "mempelajari"
            );
            $content2 = $flex->kanatable(
                "に",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/ni.png",
                "NI",
                "に",
                "ni",
                "dua",
                "にじゅう",
                "nijū",
                "dua puluh",
                "にほん",
                "Nihon",
                "Jepang",
                "にほんご",
                "Nihongo",
                "Bahasa Jepang",
                "にわとり",
                "niwatori",
                "daging ayam"
            );
            $content3 = $flex->kanatable(
                "ぬ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/nu.png",
                "NU",
                "ぬすみます",
                "Nusumimasu",
                "Mencuri",
                "ぬまた",
                "ぬまた",
                "Rawa",
                "ぬきます",
                "Nukimasu",
                "Mencabut",
                "ぬれた",
                "Nureta",
                "Basah",
                "たぬき",
                "Tanuki",
                "Rakun"
            );
            $content4 = $flex->kanatable(
                "ね",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/ne.png",
                "NE",
                "ねこ",
                "neko",
                "Kucing",
                "ねます",
                "nemasu",
                "Tidur",
                "ねがい",
                "negai",
                "Mengharapkan",
                "ねん",
                "nen",
                "Tahun",
                "ねんじゅう",
                "nenjhuu",
                "Sepanjang tahun"
            );
            $content5 = $flex->kanatable(
                "の",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/no.png",
                "NO",
                "のど",
                "nodo",
                "tenggorokan",
                "のみます",
                "nomimasu",
                "minum",
                "のります",
                "norimasu",
                "mengendarai",
                "のら",
                "nora",
                "Liar",
                "のう",
                "nou",
                "otak"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana な、に、ぬ、ね、の", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //は行
        if ($upPesan == "/HIRAGANA-HA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "は",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/HA.png",
                "HA",
                "はさみ",
                "hasami",
                "Gunting",
                "はじめます",
                "hajimemasu",
                "Mulailah",
                "はたらきます",
                "hatarakimasu",
                "kerja",
                "はち",
                "hachi",
                "Delapan",
                "はな",
                "hana",
                "bunga"
            );
            $content2 = $flex->kanatable(
                "ひ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/HI.png",
                "HI",
                "ひきます",
                "hikimasu",
                "Menarik",
                "ひこうき",
                "hikōki",
                "Pesawat",
                "ひるごはん",
                "hirugohan",
                "makan siang",
                "ひみつ",
                "himitsu",
                "rahasia",
                "ひつじ",
                "hitsuji",
                "domba"
            );
            $content3 = $flex->kanatable(
                "ふ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/HU.png",
                "HU",
                "ふでばこ",
                "fudebako",
                "Kotak pensil",
                "ふね",
                "fune",
                "mengirimkan",
                "ふゆ",
                "fuyu",
                "musim dingin",
                "ふく",
                "fuku",
                "pakaian",
                "ふるい",
                "furui",
                "tua"
            );
            $content4 = $flex->kanatable(
                "へ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/HE.png",
                "HE",
                "へや",
                "heya",
                "kamar",
                "へらす",
                "herasu",
                "mengurangi",
                "へん",
                "hen",
                "aneh",
                "へいき",
                "heiki",
                "Tenang",
                "へんか",
                "henka",
                "mengubah"
            );
            $content5 = $flex->kanatable(
                "ほ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/HO.png",
                "HO",
                "ほんだな",
                "hondana",
                "Rak buku",
                "ほんき",
                "honki",
                "Keseriusan",
                "ほんとう",
                "hontou",
                "Nyata",
                "ほしい",
                "hoshii",
                "ingin",
                "ほし",
                "hoshi",
                "Bintang"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana は、ひ、ふ、へ、ほ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //ま行
        if ($upPesan == "/HIRAGANA-MA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ま",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/MA.png",
                "MA",
                "まいしゅう",
                "maishū",
                "Setiap minggu",
                "まいにち",
                "mainichi",
                "setiap hari",
                "まいばん",
                "maiban",
                "setiap malam",
                "まご",
                "mago",
                "Cucu",
                "まど",
                "mado",
                "jendela"
            );
            $content2 = $flex->kanatable(
                "み",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/MI.png",
                "MI",
                "みかん",
                "mikan",
                "jeruk mandarin",
                "みず",
                "mizu",
                "air",
                "みせます",
                "misemasu",
                "Memperlihatkan",
                "みそしる",
                "misoshiru",
                "Sup miso",
                "みます",
                "mimasu",
                "jam tangan"
            );
            $content3 = $flex->kanatable(
                "む",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/MU.png",
                "MU",
                "むすこ",
                "musuko",
                "putra",
                "むすめ",
                "musume",
                "Anak perempuan",
                "むり",
                "muri",
                "Mustahil",
                "むし",
                "mushi",
                "serangga",
                "むら",
                "mura",
                "Desa"
            );
            $content4 = $flex->kanatable(
                "め",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/ME.png",
                "ME",
                "め",
                "me",
                "mata",
                "めがね",
                "megane",
                "kacamata",
                "めんせつ",
                "mensetsu",
                "wawancara",
                "めざす",
                "mezasu",
                "tujuan",
                "めし",
                "meshi",
                "makanan"
            );
            $content5 = $flex->kanatable(
                "も",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/ＭO.png",
                "MO",
                "もらいます",
                "moraimasu",
                "menerima",
                "もり",
                "mori",
                "Hutan",
                "もも",
                "momo",
                "Persik",
                "もんだい",
                "mondai",
                "masalah",
                "もう",
                "mou",
                "Sudah"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana ま、み、む、め、も", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //や行
        if ($upPesan == "/HIRAGANA-YA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "や",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/YA.png",
                "YA",
                "やきゅう",
                "yakyū",
                "baseball",
                "やね",
                "yane",
                "atap",
                "やま",
                "yama",
                "bola",
                "やぎ",
                "yagi",
                "kambing",
                "やく",
                "yaku",
                "alasan"
            );
            $content2 = $flex->kanatable(
                "ゆ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/YU.png",
                "YU",
                "ゆび",
                "yubi",
                "jari",
                "ゆき",
                "yuki",
                "salju",
                "ゆみ",
                "yumi",
                "busur",
                "ゆめ",
                "yume",
                "mimpi",
                "ゆうびん",
                "yuubin",
                "Pos"
            );
            $content3 = $flex->kanatable(
                "よ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/YO.png",
                "YO",
                "よみます",
                "yomimasu",
                "Membaca",
                "よろこびます",
                "yorokobimasu",
                "senang",
                "よん ",
                "yon",
                "empat",
                "ようせつ",
                "yosetsu",
                "pengelasan",
                "よろい",
                "yoroi",
                "baju zirah"
            );
            $contents = [$content1, $content2, $content3];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana や、ゆ、よ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //ら行
        if ($upPesan == "/HIRAGANA-RA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ら",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/RA.png",
                "RA",
                "らく",
                "raku",
                "mudah",
                "らいにち",
                "rainichi",
                "Datang ke Jepang",
                "らいげつ",
                "raigetsu",
                "bulan depan",
                "らいしゅう",
                "raishū",
                "minggu depan",
                "らいねん",
                "rainen",
                "tahun depan"
            );
            $content2 = $flex->kanatable(
                "り",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/RI.png",
                "RI",
                "りょうしん",
                "ryōshin",
                "orang tua",
                "りょうり",
                "ryōri",
                "memasak",
                "りんご",
                "ringo",
                "apel",
                "りれき",
                "rireki",
                "sejarah",
                "りこう",
                "rikou",
                "Sains dan Teknik"
            );
            $content3 = $flex->kanatable(
                "る",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/RU.png",
                "RU",
                "るすばん",
                "rusuban",
                "Penjaga",
                "かるい",
                "karui",
                "lampu",
                "まるい",
                "marui",
                "bulat",
                "ずるい",
                "zurui",
                "Tidak adil",
                "するどい",
                "surudoi",
                "tajam"
            );
            $content4 = $flex->kanatable(
                "れ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/RE.png",
                "RE",
                "れんらく",
                "Renraku",
                "Kontak",
                "れんしゅう",
                "renshuu",
                "Latihan",
                "れきし",
                "rekishi",
                "sejarah",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-"
            );
            $content5 = $flex->kanatable(
                "ろ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/RO.png",
                "RO",
                "ろうどう",
                "roudou",
                "Tenaga kerja",
                "ろうそく",
                "rousoku",
                "Lilin",
                "ろうじん",
                "roujin",
                "Pria tua",
                "ろまじ",
                "romaji",
                "Roma",
                "ろく",
                "roku",
                "Enam"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana ら、り、る、れ、ろ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //わをん行
        if ($upPesan == "/HIRAGANA-N") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "わ",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/WA.png",
                "WA",
                "わたします",
                "watashimasu",
                "Menyerahkan",
                "わらいます",
                "waraimasu",
                "tertawa",
                "わくわく",
                "wakuwaku",
                "excited",
                "わたし",
                "watashi",
                "Saya",
                "わかります",
                "wakarimasu",
                "Mengerti"
            );
            $content2 = $flex->kanatable(
                "を",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/WO.png",
                "WO",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-"
            );
            $content3 = $flex->kanatable(
                "ん",
                "https://gengobot.com/bot/asset_bot/kana/hiragana/N.png",
                "N",
                "らくえん",
                "rakuen",
                "Surga",
                "なんにん",
                "nannin",
                "Berapa orang",
                "さつじん",
                "satsujin",
                "pembunuhan",
                "きょうじん",
                "kyoujin",
                "orang gila",
                "しんせつ",
                "shinsetu",
                "Baik"
            );
            $contents = [$content1, $content2, $content3];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Hiragana わ、を、ん", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //HIRAGANA END
        //KATAKANA
        //あ行
        if ($upPesan == "/KATAKANA-A") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ア",
                "https://gengobot.com/bot/asset_bot/kana/katakana/A.png",
                "A",
                "アイスクリーム",
                "aisukuriimu",
                "es krim",
                "アイデア",
                "aidea",
                "ide",
                "アイドル",
                "aidoru",
                "Idola",
                "アクセス",
                "akusesu",
                "mengakses",
                "アドバイス",
                "adobaisu",
                "nasihat"
            );
            $content2 = $flex->kanatable(
                "イ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/I.png",
                "I",
                "イメージ",
                "imeeji",
                "gambar",
                "イヤホン",
                "iyahon",
                "earphone",
                "イラスト",
                "irasuto",
                "Ilustrasi",
                "インターネット",
                "intaanetto",
                "Internet",
                "インタビュー",
                "interview",
                "wawancara"
            );
            $content3 = $flex->kanatable(
                "ウ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/U.png",
                "U",
                "ウイルス",
                "uirusu",
                "virus",
                "ウェブ",
                "uebu",
                "web",
                "ウサギ",
                "usagi",
                "kelinci",
                "ウルトラマン",
                "urutoraman",
                "Ultraman",
                "ウズベキスタン",
                "uzubekisutan",
                "Uzbekistan"
            );
            $content4 = $flex->kanatable(
                "エ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/E.png",
                "E",
                "エアコン",
                "eakon",
                "Pendingin ruangan",
                "エスカレーター",
                "esukareetaa",
                "eskalator",
                "エネルギー",
                "enerugii",
                "energi",
                "エレベーター",
                "erebeetaa",
                "Tangga berjalan",
                "エンジニア",
                "enjinia",
                "insinyur"
            );
            $content5 = $flex->kanatable(
                "オ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/O.png",
                "O",
                "オーバー",
                "oobaa",
                "lebih-",
                "オーブン",
                "oobun",
                "oven",
                "オープン",
                "oopun",
                "membuka",
                "オリンピック",
                "orinpikku",
                "Olimpiade",
                "オーストラリア",
                "Oostoraria",
                "Australia"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana ア、イ、ウ、エ、オ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //か行
        if ($upPesan == "/KATAKANA-KA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "カ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/KA.png",
                "KA",
                "カード",
                "kaado",
                "kartu",
                "カウンター",
                "kauntaa",
                "menangkal",
                "カジュアル",
                "kajyuaru",
                "santai",
                "カット",
                "katto",
                "memotong",
                "カップル",
                "kappuru",
                "Pasangan"
            );
            $content2 = $flex->kanatable(
                "キ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/KI.png",
                "KI",
                "キーホルダー",
                "kiihorudaa",
                "gantungan kunci",
                "キス",
                "kisu",
                "ciuman",
                "キャッシュカード",
                "kyasshukaado",
                "Kartu tunai",
                "キャンセル",
                "kyanseru",
                "Membatalkan",
                "-",
                "-",
                "-"
            );
            $content3 = $flex->kanatable(
                "ク",
                "https://gengobot.com/bot/asset_bot/kana/katakana/KU.png",
                "KU",
                "クイズ",
                "kuizu",
                "ulangan",
                "クラシック",
                "kurashikku",
                "Klasik",
                "クリスマス",
                "kurisumasu",
                "Natal",
                "クリップ",
                "kurippu",
                "klip",
                "クレーム",
                "kureemu",
                "mengeklaim"
            );
            $content4 = $flex->kanatable(
                "ケ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/KE.png",
                "KE",
                "ケーブル",
                "keeburu",
                "kabel",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-"
            );
            $content5 = $flex->kanatable(
                "コ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/KO.png",
                "KO",
                "コピー",
                "kopii",
                "salinan",
                "ココア",
                "kokoa",
                "biji cokelat",
                "コスト",
                "kosuto",
                "biaya",
                "コメント",
                "komento",
                "komentar",
                "コンテスト",
                "kontesuto",
                "Kontes"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana カ、キ、ク、ケ、コ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //さ行
        if ($upPesan == "/KATAKANA-SA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "サ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/SA.png",
                "SA",
                "サービス",
                "saabisu",
                "melayani",
                "サイズ",
                "saizu",
                "ukuran",
                "サイン",
                "sain",
                "Tandatangan",
                "サンプル",
                "sanpuru",
                "Sampel",
                "サッカー",
                "sakkaa",
                "Sepak bola"
            );
            $content2 = $flex->kanatable(
                "シ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/SHI.png",
                "SHI",
                "シール",
                "shiiru",
                "stiker",
                "システム",
                "sisutemu",
                "sistem",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-"
            );
            $content3 = $flex->kanatable(
                "ス",
                "https://gengobot.com/bot/asset_bot/kana/katakana/SU.png",
                "SU",
                "スーパー",
                "Suupaa",
                "Supermarket",
                "ストレス",
                "Sutoresu",
                "Stress",
                "スピーチ",
                "Supiichi",
                "Pidato",
                "スピード",
                "Supiido",
                "Kecepatan",
                "スプーン",
                "Supuun",
                "Sendok"
            );
            $content4 = $flex->kanatable(
                "セ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/SE.png",
                "SE",
                "セーター",
                "seetaa",
                "sweter",
                "セット",
                "setto",
                "mengatur",
                "セルフサービス",
                "serufusaabisu",
                "selfservice",
                "セロハンテープ",
                "serohanteepu",
                "selotip",
                "センター",
                "Sentaa",
                "Center"
            );
            $content5 = $flex->kanatable(
                "ソ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/SO.png",
                "SO",
                "ソック",
                "Sokku",
                "Terkejut",
                "ソファー",
                "Sofaa",
                "Sofa",
                "ソフトウェア",
                "sofutowea",
                "perangkat lunak",
                "ソフトボール",
                "sofutobooru",
                "bola lunak",
                "ソニー",
                "sonii",
                "Sony"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana サ、シ、ス、セ、ソ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //た行
        if ($upPesan == "/KATAKANA-TA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "タ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/TA.png",
                "TA",
                "タイプ",
                "taipu",
                "Tipe",
                "タイム",
                "taimu",
                "waktu",
                "タイヤ",
                "taiya",
                "ban",
                "タオル",
                "taoru",
                "handuk",
                "タクシー",
                "takushii",
                "taksi"
            );
            $content2 = $flex->kanatable(
                "チ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/CHI.png",
                "CHI",
                "チーム",
                "chiimu",
                "tim",
                "チキン",
                "chikin",
                "ayam",
                "チーズ",
                "Chiizu",
                "Keju",
                "チート",
                "chiito",
                "mencurangi",
                "チタニウム",
                "chitaniumu",
                "Titanium"
            );
            $content3 = $flex->kanatable(
                "ツ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/TSU.png",
                "TSU",
                "ツール",
                "tsuuru",
                "Peralatan",
                "ツールバー",
                "tsuurubaa",
                "Toolbar",
                "ツーリング",
                "tsuuringu",
                "Touring",
                "ツーリスト",
                "tsuurisuto",
                "Turis",
                "ツールボックス",
                "tsuurubokkusu",
                "Toolbox"
            );
            $content4 = $flex->kanatable(
                "テ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/TE.png",
                "TE",
                "テープ",
                "Teepu",
                "Tape",
                "テスト",
                "Tesuto",
                "Test / Ujian",
                "テニス",
                "Tenisu",
                "Tenis",
                "テレビ",
                "Terebi",
                "Televisi",
                "テロ",
                "tero",
                "terorisme"
            );
            $content5 = $flex->kanatable(
                "ト",
                "https://gengobot.com/bot/asset_bot/kana/katakana/TO.png",
                "TO",
                "トイレ",
                "Toire",
                "Toilet",
                "トラック",
                "Torakku",
                "Truck",
                "トースト",
                "toosuto",
                "roti panggang",
                "トップ",
                "toppu",
                "Atas",
                "トマト",
                "tomato",
                "tomat"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana タ、チ、ツ、テ、ト", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //な行
        if ($upPesan == "/KATAKANA-NA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ナ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/NA.png",
                "NA",
                "ナイフ",
                "Naifu",
                "Pisau",
                "ナプキン",
                "Napukin",
                "Lap",
                "ナイス",
                "naisu",
                "baik",
                "ナタリー",
                "natarii",
                "Natalie",
                "ナターシャ",
                "Nataasha",
                "Natasha"
            );
            $content2 = $flex->kanatable(
                "ニ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/NI.png",
                "NI",
                "ニックネーム",
                "nikkuneemu",
                "nama panggilan",
                "ニキータ",
                "Nikiita",
                "Nikita",
                "ニラ",
                "Nina",
                "Nira",
                "ニナ",
                "Nina",
                "Nina",
                "ニセコイ",
                "Nisekoi",
                "Nisekoi"
            );
            $content3 = $flex->kanatable(
                "ヌ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/NU.png",
                "NU",
                "ヌルデータ",
                "nurudeeta",
                "Data nol",
                "ヌサドゥア",
                "nusadoua",
                "Nusa Dua",
                "ヌルル",
                "nururu",
                "Nurul",
                "ヌサテンガラ",
                "Nusa tenggara",
                "Nusa Tenggara",
                "ヌテラ",
                "nutera",
                "Nutella"
            );
            $content4 = $flex->kanatable(
                "ネ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/NE.png",
                "NE",
                "ネクタイ",
                "Nekutai",
                "Dasi",
                "ネックレース",
                "Nekkureesu",
                "Kalung",
                "ネットワーク",
                "Nettowaaku",
                "jaringan",
                "ネット",
                "Netto",
                "Internet",
                "ネルソン",
                "Neruson",
                "Nelson"
            );
            $content5 = $flex->kanatable(
                "ノ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/MO.png",
                "NO",
                "ノート",
                "Nooto",
                "Catatan",
                "ノートパソコン",
                "Nootopasokon",
                "laptop",
                "ノック",
                "Nokku",
                "ketukan",
                "ノーマル",
                "noomaru",
                "normal",
                "ノラガミ",
                "Noragami",
                "Noragami"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana ナ、ニ、ヌ、ネ、ノ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //は行
        if ($upPesan == "/KATAKANA-HA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ハ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/HA.png",
                "HA",
                "ハイキング",
                "Haikingu",
                "Haiking",
                "ハンカチ",
                "Hankachi",
                "Sapu tanggan",
                "ハンサム",
                "Hansamu",
                "Ganteng",
                "ハラール",
                "Haraaru",
                "Halal",
                "ハロウィン",
                "Harowin",
                "Halloween"
            );
            $content2 = $flex->kanatable(
                "ヒ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/HI.png",
                "HI",
                "ヒント",
                "Hinto",
                "Petunjuk",
                "ヒーター",
                "Hiita",
                "pemanas",
                "ヒツジ",
                "Hitsuji",
                "Domba",
                "ヒロイン",
                "Hiroin",
                "pahlawan wanita",
                "ヒーロー",
                "Hiiroo",
                "Pahlawan"
            );
            $content3 = $flex->kanatable(
                "フ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/HU.png",
                "HU",
                "フットサル",
                "Futtosaru",
                "Futsal",
                "ファイル",
                "Fuairu",
                "File",
                "フード",
                "Fuudo",
                "Makanan",
                "フリー",
                "Furii",
                "Gratis",
                "フリガナ",
                "Furigana",
                "Furigana"
            );
            $content4 = $flex->kanatable(
                "ヘ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/HE.png",
                "HE",
                "ヘアースタイル",
                "heaasutairu",
                "gaya rambut",
                "ヘッドホン",
                "heddohon",
                "headphone",
                "ヘルメット",
                "Herumetto",
                "Helm",
                "ヘレン",
                "Heren",
                "Helen",
                "ヘルパー",
                "Herupaa",
                "pembantu"
            );
            $content5 = $flex->kanatable(
                "ホ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/HO.png",
                "HO",
                "ホームステイ",
                "hoomusutei",
                "Homestay",
                "ホテル",
                "hoteru",
                "Hotel",
                "ホームページ",
                "Hoomupeeji",
                "Halaman utama",
                "ホログラム",
                "Horoguramu",
                "hologram",
                "ホスト",
                "Hosuto",
                "Host"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana ハ、ヒ、フ、ヘ、ホ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //ま行
        if ($upPesan == "/KATAKANA-MA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "マ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/MA.png",
                "MA",
                "マニュアル",
                "manyuaru",
                "manual",
                "マスコミ",
                "masukomi",
                "Media",
                "マネージャー",
                "Maneejaa",
                "Manajer",
                "マネジメント",
                "Manejimento",
                "pengelolaan",
                "マイクロソフト",
                "Maikurosofuto",
                "Microsoft"
            );
            $content2 = $flex->kanatable(
                "ミ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/MI.png",
                "MI",
                "ミルク",
                "Miruku",
                "Susu",
                "ミーティング",
                "meeting",
                "pertemuan",
                "ミス",
                "mistake",
                "Kesalahan",
                "ミートボール",
                "Miitobooru",
                "bakso",
                "ミックス",
                "Mikkusu",
                "mencampur"
            );
            $content3 = $flex->kanatable(
                "ム",
                "https://gengobot.com/bot/asset_bot/kana/katakana/MU.png",
                "MU",
                "ムービー",
                "Muubii",
                "Film",
                "ムーブメント",
                "Muubumento",
                "Pergerakan",
                "ムスリム",
                "Musurimu",
                "Muslin",
                "ムハマド",
                "Muhamado",
                "Muhammad",
                "-",
                "-",
                "-"
            );
            $content4 = $flex->kanatable(
                "メ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/ME.png",
                "ME",
                "メッセージ",
                "Messeeji",
                "Pesan",
                "メニュー",
                "Menyuu",
                "Menu",
                "メンバー",
                "Membaa",
                "Member",
                "メイク",
                "Meiku",
                "membuat",
                "メール",
                "Meeru",
                "Surel"
            );
            $content5 = $flex->kanatable(
                "モ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/ＭO.png",
                "MO",
                "モール",
                "Mooru",
                "Mall",
                "モノレール",
                "Monoreeru",
                "monorel",
                "モード",
                "Moodo",
                "mode",
                "モーツァルト",
                "Moosharuto",
                "Mozart",
                "モーター",
                "Mootaa",
                "motor"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana マ、ミ、ム、メ、モ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //や行
        if ($upPesan == "/KATAKANA-YA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ヤ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/YA.png",
                "YA",
                "ヤード",
                "Yaado",
                "Halaman",
                "ヤーマン",
                "Yaaman",
                "Yarman",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-"
            );
            $content2 = $flex->kanatable(
                "ユ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/YU.png",
                "YU",
                "ユーザー",
                "Yuuzaa",
                "pengguna",
                "ユーチューブ",
                "Yuuchuubu",
                "Youtube",
                "ユーティリティ",
                "Yuutiriti",
                "kegunaan",
                "ユニクロ",
                "Yunikuro",
                "Uniqlo",
                "ユニバーサル",
                "Yunibaasaru",
                "Universal"
            );
            $content3 = $flex->kanatable(
                "ヨ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/YO.png",
                "YO",
                "ヨーロッパ",
                "Yooroppa",
                "Eropa",
                "ヨーグルト",
                "Yooguruto",
                "yogurt",
                "ヨーヨー",
                "Yooyoo",
                "Yo -yo",
                "ヨガ",
                "Yoga",
                "yoga",
                "-",
                "-",
                "-"
            );
            $contents = [$content1, $content2, $content3];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana ヤ、ユ、ヨ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //ら行
        if ($upPesan == "/KATAKANA-RA") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ラ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/RA.png",
                "RA",
                "ライター",
                "Raitaa",
                "Korek api",
                "ラジオ",
                "Rajio",
                "Radio",
                "ラーメン",
                "raamen",
                "ramen",
                "ライオン",
                "raion",
                "Singa",
                "ライト",
                "raito",
                "Lampu"
            );
            $content2 = $flex->kanatable(
                "リ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/RI.png",
                "RI",
                "リサイクル",
                "risaikuru",
                "mendaur ulang",
                "リスト",
                "risuto",
                "daftar",
                "リズム",
                "rizumu",
                "irama",
                "リーダー",
                "Riidaa",
                "pemimpin",
                "リーフレット",
                "Riifuretto",
                "Selebaran"
            );
            $content3 = $flex->kanatable(
                "ル",
                "https://gengobot.com/bot/asset_bot/kana/katakana/RU.png",
                "RU",
                "ルール",
                "Ruuru",
                "Peraturan",
                "ルーター",
                "Ruutaa",
                "router",
                "ルート",
                "Ruuto",
                "akar",
                "ルーフ",
                "Ruufu",
                "atap",
                "ルパン",
                "Rupan",
                "Lupin"
            );
            $content4 = $flex->kanatable(
                "レ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/RE.png",
                "RE",
                "レジ",
                "reji",
                "kasir",
                "レストラン",
                "resutoran",
                "restoran",
                "レインコート",
                "Reinkooto",
                "Jas hujan",
                "レストラン",
                "Resutoran",
                "Restoran",
                "レポート",
                "Repooto",
                "Laporan"
            );
            $content5 = $flex->kanatable(
                "ロ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/RO.png",
                "RO",
                "ロック",
                "rokku",
                "Kunci",
                "ローソン",
                "rooson",
                "Lawson",
                "ログイン",
                "roguin",
                "Login",
                "ロールプレイ",
                "roorupurei",
                "Roleplay",
                "ロープ",
                "roopu",
                "Tali"
            );
            $contents = [$content1, $content2, $content3, $content4, $content5];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakana ラ、リ、ル、レ、ロ", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //わをん行
        if ($upPesan == "/KATAKANA-N") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->kanatable(
                "ワ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/WA.png",
                "WA",
                "ワーク",
                "waaku",
                "kerja",
                "ワールド",
                "waarudo",
                "dunia",
                "ワークショップ",
                "waakushoppu",
                "bengkel",
                "ワード",
                "waado",
                "kata",
                "ワサビ",
                "Wasabi",
                "Wasabi"
            );
            $content2 = $flex->kanatable(
                "ヲ",
                "https://gengobot.com/bot/asset_bot/kana/katakana/WO.png",
                "WO",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-",
                "-"
            );
            $content3 = $flex->kanatable(
                "ン",
                "https://gengobot.com/bot/asset_bot/kana/katakana/N.png",
                "N",
                "ランチ",
                "ranchi",
                "makan siang",
                "チキン",
                "chikin",
                "ayam",
                "マンション",
                "manshon",
                "Apartemen",
                "マンガ",
                "manga",
                "Manga",
                "ハンバーグ",
                "hanbaagu",
                "Hamburger"
            );
            $contents = [$content1, $content2, $content3];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Katakaba ワ、ヲ、ン", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        //KATAKANA END
        //KATAKANA
        //
        //
        //
        //
        //
        //TABELKANA END
        if ($upPesan == "CB") {
            require "flex.php";
            $flex = new flex();
            $content1 = $flex->bantu();
            $content2 = $flex->bantu();
            $content3 = $flex->bantu();
            $contents = [$content1, $content2, $content3];
            $carousel = $flex->carouselflex($contents);
            $messages = [];
            $msg1 = $send->flex("Pilih Level Bunpou", $carousel);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/KONTAK") {
            $messages = [];
            $msg1 = $send->image(
                "https://gengobot.com/bot/imagemap/CONTACT.jpg"
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/QR") {
            $messages = [];
            $msg1 = $send->quickreply();
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "DAFTARLATIHAN") {
            $data = [
                "userid" => $userId,
                "nama" => $nama,
            ];
            $sql = $this->Dbs->insert($data, "quiz");
            if ($sql) {
                $messages = [];
                $msg1 = $send->text(
                    "Selamat anda telah terdaftar untuk mengikuti latihan"
                );
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } else {
                $messages = [];
                $msg1 = $send->text("anda telah terdaftar");
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            }
        }
        // ENCOBA
        // MODE PILIH BAHASA
        if ($upPesan == "/ID") {
            $where = ["userid" => $userId];
            $data = ["bahasa" => "indonesia"];
            $sql = $this->Dbs->update($where, $data, "user");
            if ($sql) {
                $messages = [];
                $msg1 = $send->text("Sedang menggunakan Bahasa Indonesia");
                $ballons = $send->imagemapmenu(
                    "https://gengobot.com/bot/imagemap/ID/MENU",
                    "PILIH MENU",
                    "/ID>JP",
                    "/JP>ID",
                    "/LATIHAN",
                    "/INDEKS",
                    "/MORE"
                );
                array_push($messages, $msg1, $ballons);
                $output = $send->reply($replyToken, $messages);
            } else {
                $messages = [];
                $msg1 = $send->text("Anda masih dalam mode Bahasa Indonesia");
                $ballons = $send->imagemapmenu(
                    "https://gengobot.com/bot/imagemap/ID/MENU",
                    "PILIH MENU",
                    "/ID>JP",
                    "/JP>ID",
                    "/LATIHAN",
                    "/INDEKS",
                    "/MORE"
                );
                array_push($messages, $msg1, $ballons);
                $output = $send->reply($replyToken, $messages);
            }
        } elseif ($upPesan == "/JP") {
            $messages = [];
            $msg1 = $send->text(
                "Mohon maaf, mode bahasa Jepang sedang dalam tahap pengembangan"
            );
            $ballons = $send->imagemapmenu(
                "https://gengobot.com/bot/imagemap/ID/MENU",
                "PILIH MENU",
                "/ID>JP",
                "/JP>ID",
                "/LATIHAN",
                "/INDEKS",
                "/MORE"
            );
            array_push($messages, $msg1, $ballons);
            $output = $send->reply($replyToken, $messages);
            //  $where=array('userid'=>$userId);
            //  $data=array('bahasa'=>'jepang');
            //  $sql=$this->Dbs->update($where,$data,'user');
            //  if($sql){
            //   $messages=[];
            //   $msg1=$send->text("日本語を使っています");
            //   array_push($messages,$msg1);
            //   $output=$send->reply($replyToken,$messages);
            //   }else{
            //     $messages=[];
            //   $msg1=$send->text("また日本語を使っています");
            //   array_push($messages,$msg1);
            //   $output=$send->reply($replyToken,$messages);
            //   }
        } elseif ($upPesan == "/EN") {
            $messages = [];
            $msg1 = $send->text(
                "Mohon maaf, mode bahasa Inggris sedang dalam tahap pengembangan"
            );
            $msg2 = $send->text(
                "I am sorry, English Language is not available yet. Please check again later"
            );
            $ballons = $send->imagemapmenu(
                "https://gengobot.com/bot/imagemap/ID/MENU",
                "PILIH MENU",
                "/ID>JP",
                "/JP>ID",
                "/LATIHAN",
                "/INDEKS",
                "/MORE"
            );
            array_push($messages, $msg1, $msg2, $ballons);
            $output = $send->reply($replyToken, $messages);
            // $where=array('userid'=>$userId);
            // $data=array('bahasa'=>'english');
            // $sql=$this->Dbs->update($where,$data,'user');
            // if($sql){
            //  $messages=[];
            //  $msg1=$send->text("You are in English mode now");
            //  $ballons=$send->imagemapmenu("https://gengobot.com/bot/imagemap/EN/MENU","CHOOSE MENU","/EN>JP","/JP>EN","/EXERCISE","/INDEKS","/MORE");
            //  array_push($messages,$msg1,$ballons);
            //  $output=$send->reply($replyToken,$messages);
            //  }else{
            //    $messages=[];
            //  $msg1=$send->text("You are still in english mode");
            //  $ballons=$send->imagemapmenu("https://gengobot.com/bot/imagemap/EN/MENU","CHOOSE MENU","/EN>JP","/JP>EN","/EXERCISE","/INDEKS","/MORE");
            //  array_push($messages,$msg1,$ballons);
            //  $output=$send->reply($replyToken,$messages);
            //  }
        } // END MODE PILIH BAHASA
        // index
        if ($upPesan == "/INDEKSJP5") {
            $loadDb = $this->Dbs->getindexbpn5()->row();
            $get = $loadDb->bunpou;
            $fixGet = substr($get, 0, 2000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("List bunpou N5:\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSID5") {
            $loadDb = $this->Dbs->getindexpdn5()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (N5):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSEN5") {
            $loadDb = $this->Dbs->getindexpdn5_en()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("English word list (N5):\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSJP4") {
            $loadDb = $this->Dbs->getindexbpn4()->row();
            $get = $loadDb->bunpou;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("List bunpou N4 :\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSID4") {
            $loadDb = $this->Dbs->getindexpdn4()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (N4):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSEN4") {
            $loadDb = $this->Dbs->getindexpdn4_en()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (N4):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSJP3") {
            $loadDb = $this->Dbs->getindexbpn3()->row();
            $get = $loadDb->bunpou;
            $fixGet = substr($get, 0, 2000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("List bunpou N3:\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSID3") {
            $loadDb = $this->Dbs->getindexpdn3()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (N3):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSEN3") {
            $loadDb = $this->Dbs->getindexpdn3_en()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("English word list (N3):\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSJP2") {
            $loadDb = $this->Dbs->getindexbpn2()->row();
            $get = $loadDb->bunpou;
            $fixGet = substr($get, 0, 2000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("List bunpou N2:\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSID2") {
            $loadDb = $this->Dbs->getindexpdn2()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (N2):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSEN2") {
            $loadDb = $this->Dbs->getindexpdn2_en()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("English word list (N2):\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSJP1") {
            $loadDb = $this->Dbs->getindexbpn1()->row();
            $get = $loadDb->bunpou;
            $fixGet = substr($get, 0, 2000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("List bunpou N1:\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSID1") {
            $loadDb = $this->Dbs->getindexpdn1()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (N1):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSEN1") {
            $loadDb = $this->Dbs->getindexpdn1_en()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("English word list (N1):\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSJPALL") {
            $loadDb = $this->Dbs->getindexbp()->row();
            $get = $loadDb->bunpou;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text("List bunpou (Semua):\r\n" . $fixReplace);
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSIDALL") {
            $loadDb = $this->Dbs->getindexpd()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (Semua):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        if ($upPesan == "/INDEKSENALL") {
            $loadDb = $this->Dbs->getindexpd_en()->row();
            $get = $loadDb->padanan;
            $fixGet = substr($get, 0, 3000);
            $fixReplace = str_replace(",", "\r\n", $fixGet);
            $messages = [];
            $msg1 = $send->text(
                "List bahasa Indonesia (Semua):\r\n" . $fixReplace
            );
            array_push($messages, $msg1);
            $output = $send->reply($replyToken, $messages);
        }
        // END INDEX
        // INDO
        if ($db->bahasa == "indonesia") {
            //bantuan
            if ($upPesan == "/HELP") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->help(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/bahasa.png",
                    "/HELPBHS"
                );
                $content2 = $flex->help(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian.png",
                    "/HELPSRC"
                );
                $content3 = $flex->help(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan.png",
                    "/HELPLAT"
                );
                $content4 = $flex->help(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks.png",
                    "/HELPIDX"
                );
                $contents = [$content1, $content2, $content3, $content4];
                $carousel = $flex->carouselflex($contents);
                $messages = [];
                $msg1 = $send->flex("Pilih Bantuan", $carousel);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/HELPBHS") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/bahasa/0.png"
                );
                $content2 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/bahasa/1.png"
                );
                $content3 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/bahasa/2.png"
                );
                $content4 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/bahasa/3.png"
                );
                $contents = [$content1, $content2, $content3, $content4];
                $carousel = $flex->carouselflex($contents);
                $messages = [];
                $msg1 = $send->flex("Pilih Bantuan", $carousel);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/HELPSRC") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/0.png"
                );
                $content2 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/1.png"
                );
                $content3 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/2.png"
                );
                $content4 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/3.png"
                );
                $content5 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/4.png"
                );
                $content6 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/5.png"
                );
                $content7 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/6.png"
                );
                $content8 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/pencarian/7.png"
                );
                $contents = [
                    $content1,
                    $content2,
                    $content3,
                    $content4,
                    $content5,
                    $content6,
                    $content7,
                    $content8,
                ];
                $carousel = $flex->carouselflex($contents);
                $messages = [];
                $msg1 = $send->flex("Pilih Bantuan", $carousel);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/HELPLAT") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/0.png"
                );
                $content2 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/1.png"
                );
                $content3 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/2.png"
                );
                $content4 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/3.png"
                );
                $content5 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/4.png"
                );
                $content6 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/5.png"
                );
                $content7 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/6.png"
                );
                $content8 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/7.png"
                );
                $content9 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/8.png"
                );
                $content10 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/latihan/9.png"
                );
                $contents = [
                    $content1,
                    $content2,
                    $content3,
                    $content4,
                    $content5,
                    $content6,
                    $content7,
                    $content8,
                    $content9,
                    $content10,
                ];
                $carousel = $flex->carouselflex($contents);
                $messages = [];
                $msg1 = $send->flex("Pilih Bantuan", $carousel);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/HELPIDX") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks/0.png"
                );
                $content2 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks/1.png"
                );
                $content3 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks/2.png"
                );
                $content4 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks/3.png"
                );
                $content5 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks/4.png"
                );
                $content6 = $flex->bantu(
                    "https://www.gengobot.com/bot/asset_bot/bantuan/ID/indeks/5.png"
                );
                $contents = [
                    $content1,
                    $content2,
                    $content3,
                    $content4,
                    $content5,
                    $content6,
                ];
                $carousel = $flex->carouselflex($contents);
                $messages = [];
                $msg1 = $send->flex("Pilih Bantuan", $carousel);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            }
            //end bantuan
            if ($upPesan == "/LB") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->leaderboard();
                $messages = [];
                $msg1 = $send->flex("Perolehan Skor tertinggi", $content1);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/MODE") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->mode();
                $messages = [];
                $msg1 = $send->flex("Pilih Level Bunpou", $content1);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/CARI-JEPANG") {
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/BUNPOUN",
                        "PILIH LEVEL TATA BAHASA",
                        "/BUNPOUN5",
                        "/BUNPOUN4",
                        "/BUNPOUN3",
                        "/BUNPOUN2",
                        "/BUNPOUN1",
                        "/BUNPOUALL"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/CARI-INDONESIA") {
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/BUNPOUN",
                        "PILIH LEVEL TATA BAHASA",
                        "/INDON5",
                        "/INDON4",
                        "/INDON3",
                        "/INDON2",
                        "/INDON1",
                        "/INDOALL"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/INDOALL") {
                $where = ["userid" => $userId];
                $data = ["flag" => "padanan"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Indonesia"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/BUNPOUALL") {
                $where = ["userid" => $userId];
                $data = ["flag" => "bunpou"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Jepang"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/BUNPOUN5") {
                $where = ["userid" => $userId];
                $data = ["flag" => "bunpou5"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Jepang"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/INDON5") {
                $where = ["userid" => $userId];
                $data = ["flag" => "padanan5"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Indonesia"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/INDON4") {
                $where = ["userid" => $userId];
                $data = ["flag" => "padanan4"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Indonesia"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/BUNPOUN3") {
                $where = ["userid" => $userId];
                $data = ["flag" => "bunpou3"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Jepang"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/INDON3") {
                $where = ["userid" => $userId];
                $data = ["flag" => "padanan3"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Indonesia"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/BUNPOUN3") {
                $where = ["userid" => $userId];
                $data = ["flag" => "bunpou3"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Jepang"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/INDON2") {
                $where = ["userid" => $userId];
                $data = ["flag" => "padanan2"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Indonesia"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/BUNPOUN2") {
                $where = ["userid" => $userId];
                $data = ["flag" => "bunpou2"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Jepang"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/INDON1") {
                $where = ["userid" => $userId];
                $data = ["flag" => "padanan1"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Indonesia"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($upPesan == "/BUNPOUN1") {
                $where = ["userid" => $userId];
                $data = ["flag" => "bunpou1"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text(
                        "Silahkan masukan kata kunci bahasa Jepang"
                    );
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            }
            //KAMUS ENGINEER
            elseif ($upPesan == "/DAFTARKATA") {
                $loadDb = $this->Dbs->getindexitindo()->row();
                $get = $loadDb->dariindo;
                $fixGet = substr($get, 0, 5000);
                $fixReplace = str_replace(",", "\r\n", $fixGet);
                $loadDb2 = $this->Dbs->getindexitjp()->row();
                $get2 = $loadDb2->bajep;
                $fixGet2 = substr($get2, 0, 5000);
                $fixReplace2 = str_replace(",", "\r\n", $fixGet2);
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->cobaindexkamus(
                    "DAFTAR KOSAKATA ENGINEER",
                    $fixReplace,
                    $fixReplace2,
                    "CARI KOSAKATA",
                    "/KOSAKATA-ENGINEER-INDO"
                );
                $messages = [];
                $msg1 = $send->flex("DAFTAR KOSAKATA IT", $content1);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/DAFTARKATAS") {
                $loadDb = $this->Dbs->getindexengindo()->row();
                $get = $loadDb->dariindo;
                $fixGet = substr($get, 0, 5000);
                $fixReplace = str_replace(",", "\r\n", $fixGet);
                $loadDb2 = $this->Dbs->getindexengjp()->row();
                $get2 = $loadDb2->bajep;
                $fixGet2 = substr($get2, 0, 5000);
                $fixReplace2 = str_replace(",", "\r\n", $fixGet2);
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->cobaindexkamus(
                    "DAFTAR KOSAKATA ENGINEER",
                    $fixReplace,
                    $fixReplace2,
                    "CARI KOSAKATA",
                    "/KOSAKATA-ENGINEER-INDO"
                );
                $messages = [];
                $msg1 = $send->flex("PILIH KATEGORI KOSAKATA", $content1);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/KOSAKATA") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->flexkamus(
                    "KOSAKATA ENGINEER",
                    "https://3.bp.blogspot.com/-RVJKP2Uo4dc/Wp94HD7Y8sI/AAAAAAABKq0/R9aeQdDvQagyJB35mHG_LXIkZq_twBZSwCLcBGAs/s800/kouji_maintenance.png",
                    "kosakata bidang engineer",
                    "CARI",
                    "/KOSAKATA-ENGINEER",
                    "INDEKS BAHASA INDONESIA",
                    "/INDEKS-KOSAKATA-ENGINEER-ID",
                    "INDEKS BAHASA JEPANG",
                    "/INDEKS-KOSAKATA-ENGINEER-JP"
                );
                $content2 = $flex->flexkamus(
                    "KOSAKATA COMPUTER/IT",
                    "https://1.bp.blogspot.com/-9jufP_s7RQk/X9GX8hoyYdI/AAAAAAABcrU/-2qUflYQuNk2kAdcro0FtD_k21Mb67bwACNcBGAsYHQ/s910/computer_tokui_boy.png",
                    "kosakata bidang komputer / IT",
                    "CARI",
                    "/KOSAKATA-IT",
                    "INDEKS BAHASA INDONESIA",
                    "/INDEKS-KOSAKATA-IT-ID",
                    "INDEKS BAHASA JEPANG",
                    "/INDEKS-KOSAKATA-IT-JP"
                );
                $contents = [$content1, $content2];
                $carousel = $flex->carouselflex($contents);
                $messages = [];
                $msg1 = $send->flex("PILIH KATEGORI KOSAKATA", $carousel);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            }
            //KAMUS ENGINEER
            elseif ($upPesan == "/INDEKS-KOSAKATA-ENGINEER-ID") {
                $loadDb = $this->Dbs->getindexengindo()->row();
                $get = $loadDb->dariindo;
                $fixGet = substr($get, 0, 5000);
                $fixReplace = str_replace(",", "\r\n", $fixGet);
                $messages = [];
                $msg1 = $send->text(
                    "Daftar Kosakata Engineer bahasa Indonesia:\r\n" .
                        $fixReplace
                );
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/INDEKS-KOSAKATA-ENGINEER-JP") {
                $loadDb = $this->Dbs->getindexengjp()->row();
                $get = $loadDb->bajep;
                $fixGet = substr($get, 0, 5000);
                $fixReplace = str_replace(",", "\r\n", $fixGet);
                $messages = [];
                $msg1 = $send->text(
                    "Daftar Kosakata Engineer bahasa Jepang:\r\n" . $fixReplace
                );
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/KOSAKATA-ENGINEER") {
                $ballons = [
                    $send->imagemap2(
                        "https://gengobot.com/bot/imagemap/ID/KOSAKATA",
                        "CARI DARI BAHASA",
                        "/KOSAKATA-ENGINEER-INDO",
                        "/KOSAKATA-ENGINEER-JP"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            }
            //JP-ID
            elseif ($upPesan == "/KOSAKATA-ENGINEER-JP") {
                $where = ["userid" => $userId];
                $data = ["flag" => "kotobaeng"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text("Silahkan masukan kosakata");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($db->flag == "kotobaeng") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    require "flex.php";
                    $flex = new flex();
                    $content1 = $flex->flexkamus(
                        "KOSAKATA ENGINEER",
                        "https://3.bp.blogspot.com/-RVJKP2Uo4dc/Wp94HD7Y8sI/AAAAAAABKq0/R9aeQdDvQagyJB35mHG_LXIkZq_twBZSwCLcBGAs/s800/kouji_maintenance.png",
                        "kosakata bidang engineer",
                        "CARI",
                        "/KOSAKATA-ENGINEER",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-ENGINEER-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-ENGINEER-JP"
                    );
                    $content2 = $flex->flexkamus(
                        "KOSAKATA COMPUTER/IT",
                        "https://1.bp.blogspot.com/-9jufP_s7RQk/X9GX8hoyYdI/AAAAAAABcrU/-2qUflYQuNk2kAdcro0FtD_k21Mb67bwACNcBGAsYHQ/s910/computer_tokui_boy.png",
                        "kosakata bidang komputer / IT",
                        "CARI",
                        "/KOSAKATA-IT",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-IT-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-IT-JP"
                    );
                    $contents = [$content1, $content2];
                    $carousel = $flex->carouselflex($contents);
                    $messages = [];
                    $msg1 = $send->flex("PILIH KATEGORI KOSAKATA", $carousel);
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $loadDb = $this->Dbs->getdata_fromkamusengineerjp($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_fromkamusengineerjp($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Kosakata: \r\n" . $get->bajep);
                        $msg2 = $send->text("Hiragana: \r\n" . $get->hiragana);
                        $msg3 = $send->text("Romaji: \r\n" . $get->romaji);
                        $msg4 = $send->text(
                            "Bahasa Indonesia: \r\n" . $get->dariindo
                        );
                        array_push($messages, $msg1, $msg2, $msg3, $msg4);
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti, Atau kembali ke pilihan mode"
                        );
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //JP-ID END
            //ID-JP
            elseif ($upPesan == "/KOSAKATA-ENGINEER-INDO") {
                $where = ["userid" => $userId];
                $data = ["flag" => "kotobaengindo"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text("Silahkan masukan kosakata");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($db->flag == "kotobaengindo") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    require "flex.php";
                    $flex = new flex();
                    $content1 = $flex->flexkamus(
                        "KOSAKATA ENGINEER",
                        "https://3.bp.blogspot.com/-RVJKP2Uo4dc/Wp94HD7Y8sI/AAAAAAABKq0/R9aeQdDvQagyJB35mHG_LXIkZq_twBZSwCLcBGAs/s800/kouji_maintenance.png",
                        "kosakata bidang engineer",
                        "CARI",
                        "/KOSAKATA-ENGINEER",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-ENGINEER-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-ENGINEER-JP"
                    );
                    $content2 = $flex->flexkamus(
                        "KOSAKATA COMPUTER/IT",
                        "https://1.bp.blogspot.com/-9jufP_s7RQk/X9GX8hoyYdI/AAAAAAABcrU/-2qUflYQuNk2kAdcro0FtD_k21Mb67bwACNcBGAsYHQ/s910/computer_tokui_boy.png",
                        "kosakata bidang komputer / IT",
                        "CARI",
                        "/KOSAKATA-IT",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-IT-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-IT-JP"
                    );
                    $contents = [$content1, $content2];
                    $carousel = $flex->carouselflex($contents);
                    $messages = [];
                    $msg1 = $send->flex("PILIH KATEGORI KOSAKATA", $carousel);
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $loadDb = $this->Dbs->getdata_fromkamusengineerindo(
                        $upPesan
                    ); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(100); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_fromkamusengineerindo($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Kosakata: \r\n" . $get->bajep);
                        $msg2 = $send->text("Hiragana: \r\n" . $get->hiragana);
                        $msg3 = $send->text("Romaji: \r\n" . $get->romaji);
                        $msg4 = $send->text(
                            "Bahasa Indonesia: \r\n" . $get->dariindo
                        );
                        array_push($messages, $msg1, $msg2, $msg3, $msg4);
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti, Atau kembali ke pilihan mode"
                        );
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //ID-JP END
            //ENDKAMUSENGINEER
            //KAMUS IT
            elseif ($upPesan == "/INDEKS-KOSAKATA-IT-ID") {
                $loadDb = $this->Dbs->getindexitindo()->row();
                $get = $loadDb->dariindo;
                $fixGet = substr($get, 0, 5000);
                $fixReplace = str_replace(",", "\r\n", $fixGet);
                $messages = [];
                $msg1 = $send->text(
                    "Daftar Kosakata IT/Komputer bahasa Indonesia:\r\n" .
                        $fixReplace
                );
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/INDEKS-KOSAKATA-IT-JP") {
                $loadDb = $this->Dbs->getindexitjp()->row();
                $get = $loadDb->bajep;
                $fixGet = substr($get, 0, 5000);
                $fixReplace = str_replace(",", "\r\n", $fixGet);
                $messages = [];
                $msg1 = $send->text(
                    "Daftar Kosakata IT/Komputer bahasa Jepang:\r\n" .
                        $fixReplace
                );
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/KOSAKATA-IT") {
                $ballons = [
                    $send->imagemap2(
                        "https://gengobot.com/bot/imagemap/ID/KOSAKATA",
                        "CARI DARI BAHASA",
                        "/KOSAKATA-IT-INDO",
                        "/KOSAKATA-IT-JP"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            }
            //JP-ID
            elseif ($upPesan == "/KOSAKATA-IT-JP") {
                $where = ["userid" => $userId];
                $data = ["flag" => "kotobait"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text("Silahkan masukan kosakata");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($db->flag == "kotobait") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    require "flex.php";
                    $flex = new flex();
                    $content1 = $flex->flexkamus(
                        "KOSAKATA ENGINEER",
                        "https://3.bp.blogspot.com/-RVJKP2Uo4dc/Wp94HD7Y8sI/AAAAAAABKq0/R9aeQdDvQagyJB35mHG_LXIkZq_twBZSwCLcBGAs/s800/kouji_maintenance.png",
                        "kosakata bidang engineer",
                        "CARI",
                        "/KOSAKATA-ENGINEER",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-ENGINEER-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-ENGINEER-JP"
                    );
                    $content2 = $flex->flexkamus(
                        "KOSAKATA COMPUTER/IT",
                        "https://1.bp.blogspot.com/-9jufP_s7RQk/X9GX8hoyYdI/AAAAAAABcrU/-2qUflYQuNk2kAdcro0FtD_k21Mb67bwACNcBGAsYHQ/s910/computer_tokui_boy.png",
                        "kosakata bidang komputer / IT",
                        "CARI",
                        "/KOSAKATA-IT",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-IT-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-IT-JP"
                    );
                    $contents = [$content1, $content2];
                    $carousel = $flex->carouselflex($contents);
                    $messages = [];
                    $msg1 = $send->flex("PILIH KATEGORI KOSAKATA", $carousel);
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $loadDb = $this->Dbs->getdata_fromkamusitjp($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_fromkamusitjp($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Kosakata: \r\n" . $get->bajep);
                        $msg2 = $send->text("Hiragana: \r\n" . $get->hiragana);
                        $msg3 = $send->text("Romaji: \r\n" . $get->romaji);
                        $msg4 = $send->text(
                            "Bahasa Indonesia: \r\n" . $get->dariindo
                        );
                        array_push($messages, $msg1, $msg2, $msg3, $msg4);
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti, Atau kembali ke pilihan mode"
                        );
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //JP-ID END
            //ID-JP
            elseif ($upPesan == "/KOSAKATA-IT-INDO") {
                $where = ["userid" => $userId];
                $data = ["flag" => "kotobaitindo"];
                $sql = $this->Dbs->update($where, $data, "user");
                if ($sql) {
                    $messages = [];
                    $msg1 = $send->text("Silahkan masukan kosakata");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $messages = [];
                    $msg1 = $send->text("Terjadi error");
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                }
            } elseif ($db->flag == "kotobaitindo") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    require "flex.php";
                    $flex = new flex();
                    $content1 = $flex->flexkamus(
                        "KOSAKATA ENGINEER",
                        "https://3.bp.blogspot.com/-RVJKP2Uo4dc/Wp94HD7Y8sI/AAAAAAABKq0/R9aeQdDvQagyJB35mHG_LXIkZq_twBZSwCLcBGAs/s800/kouji_maintenance.png",
                        "kosakata bidang engineer",
                        "CARI",
                        "/KOSAKATA-ENGINEER",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-ENGINEER-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-ENGINEER-JP"
                    );
                    $content2 = $flex->flexkamus(
                        "KOSAKATA COMPUTER/IT",
                        "https://1.bp.blogspot.com/-9jufP_s7RQk/X9GX8hoyYdI/AAAAAAABcrU/-2qUflYQuNk2kAdcro0FtD_k21Mb67bwACNcBGAsYHQ/s910/computer_tokui_boy.png",
                        "kosakata bidang komputer / IT",
                        "CARI",
                        "/KOSAKATA-IT",
                        "INDEKS BAHASA INDONESIA",
                        "/INDEKS-KOSAKATA-IT-ID",
                        "INDEKS BAHASA JEPANG",
                        "/INDEKS-KOSAKATA-IT-JP"
                    );
                    $contents = [$content1, $content2];
                    $carousel = $flex->carouselflex($contents);
                    $messages = [];
                    $msg1 = $send->flex("PILIH KATEGORI KOSAKATA", $carousel);
                    array_push($messages, $msg1);
                    $output = $send->reply($replyToken, $messages);
                } else {
                    $loadDb = $this->Dbs->getdata_fromkamusitindo($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(100); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_fromkamusitindo($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Kosakata: \r\n" . $get->bajep);
                        $msg2 = $send->text("Hiragana: \r\n" . $get->hiragana);
                        $msg3 = $send->text("Romaji: \r\n" . $get->romaji);
                        $msg4 = $send->text(
                            "Bahasa Indonesia: \r\n" . $get->dariindo
                        );
                        array_push($messages, $msg1, $msg2, $msg3, $msg4);
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti, Atau kembali ke pilihan mode"
                        );
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //ID-JP END
            //KAMUSENGINEER
            // PADANAN
            elseif ($db->flag == "padanan") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frompadanan($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frompadanan($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text(
                            "Tata Bahasa : \r\n" . $get->bunpou
                        );
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END PADANAN
            // BUNPOU
            elseif ($db->flag == "bunpou") {
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frombunpou($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frombunpou($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Arti : \r\n" . $get->padanan);
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END FITUR BUNPOU
            // PADANAN4
            elseif ($db->flag == "padanan4") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frompadanan4($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_frompadanan4($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text(
                            "Tata Bahasa : \r\n" . $get->bunpou
                        );
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END PADANAN4
            // BUNPOU4
            elseif ($db->flag == "bunpou4") {
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frombunpou4($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frombunpou4($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Arti : \r\n" . $get->padanan);
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END FITUR BUNPOU4
            // PADANAN5
            elseif ($db->flag == "padanan5") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frompadanan5($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_frompadanan5($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text(
                            "Tata Bahasa : \r\n" . $get->bunpou
                        );
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END PADANAN5
            // BUNPOU5
            elseif ($db->flag == "bunpou5") {
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frombunpou5($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frombunpou5($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Arti : \r\n" . $get->padanan);
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END FITUR BUNPOU5
            // BUNPOU3
            elseif ($db->flag == "bunpou3") {
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frombunpou3($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frombunpou3($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Arti : \r\n" . $get->padanan);
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END FITUR BUNPOU3
            // PADANAN3
            elseif ($db->flag == "padanan3") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frompadanan3($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_frompadanan3($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text(
                            "Tata Bahasa : \r\n" . $get->bunpou
                        );
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END PADANAN3
            // BUNPOU2
            elseif ($db->flag == "bunpou2") {
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frombunpou2($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frombunpou2($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Arti : \r\n" . $get->padanan);
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END FITUR BUNPOU2
            // PADANAN2
            elseif ($db->flag == "padanan2") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frompadanan2($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_frompadanan2($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text(
                            "Tata Bahasa : \r\n" . $get->bunpou
                        );
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END PADANAN2
            // BUNPOU1
            elseif ($db->flag == "bunpou1") {
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frombunpou1($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs->getdata_frombunpou1($upPesan)->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text("Arti : \r\n" . $get->padanan);
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }
            //END FITUR BUNPOU1
            // PADANAN1
            elseif ($db->flag == "padanan1") {
                //CONTOH MAPPING KE PADANAN
                if ($upPesan == "/BACK") {
                    //KETIKA BOT DI INPUT KEYWORD RESET
                    $where = ["userid" => $userId]; //RESET BERDASARKAN USERID yang sedang menginput
                    $data = ["flag" => "default"];
                    $sql = $this->Dbs->update($where, $data, "user");
                    if ($sql) {
                        //jika baris di database berhasil di update
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->mode();
                        $messages = [];
                        $msg1 = $send->text("Silahkan pilih mode kembali");
                        $msg2 = $send->flex("Pilih Mode", $content1);
                        array_push($messages, $msg1, $msg2);
                        $output = $send->reply(
                            $replyToken,
                            $messages,
                            $ballons
                        );
                    }
                } else {
                    $loadDb = $this->Dbs->getdata_frompadanan1($upPesan); //LOAD semua table dari padanan
                    $check = $loadDb->num_rows(); //cek number baris yang dihasilkan
                    if ($check > 0) {
                        $get = $this->Dbs
                            ->getdata_frompadanan1($upPesan)
                            ->row(); //di eksekusi ketika data ditemukan
                        $messages = [];
                        $msg1 = $send->text(
                            "Tata Bahasa : \r\n" . $get->bunpou
                        );
                        $msg2 = $send->text("Struktur : \r\n" . $get->rumus);
                        $msg3 = $send->text("Contoh : \r\n" . $get->contoh);
                        $msg4 = $send->text(
                            "Arti Contoh : \r\n" . $get->articontoh
                        );
                        $msg5 = $send->text(
                            "Keterangan : \r\n" . $get->keterangan
                        );
                        array_push(
                            $messages,
                            $msg1,
                            $msg2,
                            $msg3,
                            $msg4,
                            $msg5
                        );
                        $output = $send->reply($replyToken, $messages);
                    } else {
                        require "flex.php";
                        $flex = new flex();
                        $content1 = $flex->backbutton();
                        $messages = [];
                        $msg1 = $send->text(
                            "Maaf keyword yang anda kirim belum ada dalam database, silahkan cek kembali lagi nanti ^^"
                        );
                        $msg2 = $send->text("Atau Kembali ke pilihan mode");
                        $msg3 = $send->flex("Kembali", $content1);
                        array_push($messages, $msg1, $msg2, $msg3);
                        $output = $send->reply($replyToken, $messages);
                    }
                }
            }

            //END PADANAN1
            // PERMENUAN
            elseif ($upPesan == "/MENU") {
                $where = ["userid" => $userId];
                $data = ["level" => "default"];
                $sql = $this->Dbs->update($where, $data, "quiz");
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/MENUS",
                        "MENU UTAMA",
                        "/CARI-TATA-BAHASA",
                        "/INDEKS",
                        "/LATIHAN",
                        "/HURUF-JEPANG",
                        "/AISATSU",
                        "/KOSAKATA"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/CARI-TATA-BAHASA") {
                $ballons = [
                    $send->imagemap2(
                        "https://gengobot.com/bot/imagemap/ID/FINDBUNPOU",
                        "PILIH BAHASA PENCARIAN",
                        "/CARI-INDONESIA",
                        "/CARI-JEPANG"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/LATIHAN5") {
                require "flex.php";
                $flex = new flex();
                $content1 = $flex->quiz();
                $messages = [];
                $msg1 = $send->flex("Latihan N5", $content1);
                array_push($messages, $msg1);
                $output = $send->reply($replyToken, $messages);
            } elseif ($upPesan == "/BAHASA") {
                $ballons = [
                    $send->imagemapbahasa(
                        "https://gengobot.com/bot/imagemap/ID/BAHASA",
                        "PILIH BAHASA",
                        "/ID",
                        "/JP"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/LATIHAN") {
                $where = ["userid" => $userId];
                $data = ["flag" => "quiz"];
                $sql = $this->Dbs->update($where, $data, "user");
                $ballons = [
                    $send->imagemap5(
                        "https://gengobot.com/bot/imagemap/ID/LATIHANN",
                        "PILIH LEVEL LATIHAN",
                        "/LATIHANN5",
                        "/LATIHANN4",
                        "/LATIHANN3",
                        "/LATIHANN2",
                        "/LATIHANN1"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/INDEKS") {
                $ballons = [
                    $send->imagemap2(
                        "https://gengobot.com/bot/imagemap/ID/INDEKS",
                        "PILIH BAHASA",
                        "/INDEKSID",
                        "/INDEKSJP"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/INDEKSID") {
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/INDEKSN",
                        "PILIH LEVEL TATA BAHASA",
                        "/INDEKSID5",
                        "/INDEKSID4",
                        "/INDEKSID3",
                        "/INDEKSID2",
                        "/INDEKSID1",
                        "/INDEKSIDALL"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/INDEKSJP") {
                $ballons = [
                    $send->imagemapmenu(
                        "https://gengobot.com/bot/imagemap/ID/INDEKSN",
                        "PILIH LEVEL TATA BAHASA",
                        "/INDEKSJP5",
                        "/INDEKSJP4",
                        "/INDEKSJP3",
                        "/INDEKSJP2",
                        "/INDEKSJP1",
                        "/INDEKSJPALL"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/INDEKSEN") {
                $ballons = [
                    $send->imagemapn(
                        "https://gengobot.com/bot/imagemap/ID/INDXN",
                        "PILIH INDEX",
                        "/INDEKSEN5",
                        "/INDEKSEN4"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            } elseif ($upPesan == "/MORE") {
                $ballons = [
                    $send->imagemapmore(
                        "https://gengobot.com/bot/imagemap/ID/MORE",
                        "PILIH",
                        "/AISATSU",
                        "/KEIGO",
                        "/TABELKANA"
                    ),
                ];
                $output = $send->reply($replyToken, $ballons);
            }
            // END PERMENUAN
            
                    // Example command: "/MULAI KUIS N5"
            elseif (preg_match("/^\/MULAI KUIS N(\d)$/", $upPesan, $matches)) {
                $level = 'N' . $matches[1];
                $userId = $this->session->userdata('user_id'); // Make sure userId is correctly assigned

                // Start new session in database
                $this->Dbs->updateQuizSession($userId, [
                    'current_question' => null,
                    'session_state' => 'active',
                    'jlptlevel' => $level,
                    'quiz_score' => 0
                ]);
                log_message('debug', "Starting new session with level: {$level} for user: {$userId}");

                $questionData = $this->quizModule->loadRandomQuestion($level);

                if (!$level) {
                    log_message('error', "Level is not set in the session for user: {$userId}");
                    $output = $send->reply($replyToken, [$send->text("Error: Quiz level not set. Please start a quiz.")]);
                } elseif ($questionData) {
                    $flexMessage = $this->quizModule->generateFlexMessage($questionData);
                    if ($flexMessage) {
                        $output = $send->reply($replyToken, [$send->flex("Here's your question", $flexMessage)]);
                    } else {
                        $output = $send->reply($replyToken, [$send->text("Sorry, an error occurred while generating the question.")]);
                    }
                } else {
                    $output = $send->reply($replyToken, [$send->text("Sorry, no questions available for this level.")]);
                }
            }

        // Handle user answers
        elseif (!preg_match("/^\//", $upPesan)) { // Ensure it's not a command but an answer
            $userId = $this->session->userdata('user_id');
            $userState = $this->Dbs->getSessionState($userId);

            if (!$userState['session_state'] == 'active') {
                log_message('error', "Level not set in session for user: {$userId}");
                $output = $send->reply($replyToken, [$send->text("Error: Quiz level not set. Please start a quiz.")]);
            } else {
                $feedbackAndNextQuestion = $this->quizModule->checkAnswer($upPesan, $userState['jlptlevel']);
                if (is_array($feedbackAndNextQuestion)) {
                    $output = $send->reply($replyToken, [
                        $send->text($feedbackAndNextQuestion[0]),  // Feedback
                        $send->flex("Here's your next question", $feedbackAndNextQuestion[1])  // Next question
                    ]);
                } else {
                    $output = $send->reply($replyToken, [$send->text($feedbackAndNextQuestion)]);
                }
            }
        }
        // Command to end the quiz
        elseif ($upPesan === "/SELESAIKAN KUIS") {
            $userId = $this->session->userdata('user_id');
            $this->Dbs->endSession($userId);  // Mark the session as ended in the database
            $scoreMessage = $this->quizModule->endSession();  // Calculate and get the final score
            $output = $send->reply($replyToken, [$send->text("Your session is complete. " + $scoreMessage)]);
        }

        $client->replyMessage($output);
    }
    

    
    
}

public function testSessionUpdate() {
    $testUserId = 'test_user_id'; // This should be replaced with a real user ID for testing
    $testLevel = 'N3';

    // Attempt to update the session
    $updateResult = $this->Dbs->updateQuizSession($testUserId, [
        'current_question' => null,
        'session_state' => 'active',
        'jlptlevel' => $testLevel,
        'quiz_score' => 0
    ]);

    if ($updateResult) {
        echo "Update successful<br>";
    } else {
        echo "Update failed<br>";
    }

    // Retrieve and display the updated data
    $updatedData = $this->Dbs->getSessionState($testUserId);
    echo "Retrieved session data: <pre>" . print_r($updatedData, true) . "</pre>";
}

public function testModelLoad() {
    $this->load->model('Dbs');
    echo "Model loaded successfully";
}
}
