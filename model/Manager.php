<?php
namespace wcoding\batch16\finalproject\Model;

class Manager {
    protected $_connection;


    const DNAME = "batch16project";
    const HOST = "localhost";
    const LOGIN = "root";
    const PWD = "";

    const LANGUAGES = array(
        'Cantonese' => 'HK', 'Chinese(Mandarin)' => 'ZH', 'Dutch' => 'NL', 'English' => 'EN',
        'French' => 'FR', 'German' => 'DE', 'Hindi' => 'HI', 'Indonesian' => 'IN', 'Italian' => 'IT', 'Japanese' => 'JA',
        'Korean' => 'KO', 'Vietnamese' => 'VI', 'Portuguese' => 'PT', 'Russian' => 'RU', 'Spanish' => 'ES'
    );

    const COUNTRIES = array(
        'KR' => 'South Korea'
    );

    const PROVINCES = array(
        'KR' => array(
            'Busan',
            'Chungcheongbuk-do',
            'Chungcheongnam-do',
            'Daegu',
            'Daejon',
            'Gwangju',
            'Incheon',
            'Gangwon-do',
            'Gyeonggi-do',
            'Gyeongsangbuk-do',
            'Gyeongsangnam-do',
            'Jeollabuk-do',
            'Jeollanam-do',
            'Jeju-do',
            'Sejong',
            'Seoul')
        );
    const CITIES = array(
        'Busan' => array(
            'Buk District',
            'Busanjin District',
            'Dong District',
            'Dongnae District',
            'Gangseo District',
            'Geumjeong District',
            'Haeundae District',
            'Jung District',
            'Nam District',
            'Saha District',
            'Sasang District',
            'Seo District',
            'Suyeong District',
            'Yeongdo District',
            'Yeonje District',
        ),
        'Chungcheongbuk-do' => array(
            'Cheongju',
            'Chungju',
            'Jecheon',
            'Eumseong',
            'Jincheon',
            'Okcheon',
            'Yeongdong',
            'Goesan',
            'Jeungpyeong',
            'Boeun',
            'Danyang'),
        'Chungcheongnam-do' => array(
            'Cheonan',
            'Asan',
            'Seosan',
            'Dangjin',
            'Gongju',
            'Nonsan',
            'Boryeong',
            'Gyeryong',
            'Hongseong',
            'Yesan',
            'Buyeo',
            'Seocheon',
            'Taean',
            'Geumsan',
            'Cheongyang',),
        'Daegu' => array(
            'Jung District',
            'Dong District',
            'Seo District',
            'Nam District',
            'Buk District',
            'Suseong District',
            'Dalseo District',
        ),
        'Daejeon' => array(
            'Daedeok District',
            'Dong District',
            'Jung District',
            'Seo District',
            'Yuseong District',
        ),
        'Gangwon-do' => array(
            'Wonju',
            'Chuncheon',
            'Gangneung',
            'Donghae',
            'Sokcho',
            'Samcheok',
            'Taebaek',
            'Hongcheon',
            'Cheorwon',
            'Hoengseong',
            'Pyeongchang',
            'Jeongseon',
            'Yeongwol',
            'Inje',
            'Goseong',
            'Yangyang',
            'Hwacheon',
            'Yanggu',),
        'Gwangju' => array(
            'Buk District',
            'Dong District',
            'Gwangsan District',
            'Nam District',
            'Seo District',
        ),
        'Gyeonggi-do' => array(
            'Suwon',
            'Seongnam',
            'Goyang',
            'Yongin',
            'Bucheon',
            'Ansan',
            'Anyang',
            'Namyangju',
            'Hwaseong',
            'Uijeongbu',
            'Siheung',
            'Pyeongtaek',
            'Gwangmyeong',
            'Paju',
            'Gunpo',
            'Gwangju',
            'Gimpo',
            'Icheon',
            'Yangju',
            'Guri',
            'Osan',
            'Anseong',
            'Uiwang',
            'Hanam',
            'Pocheon',
            'Dongducheon',
            'Gwacheon',
            'Yeoju',
            'Yangpyeong',
            'Gapyeong',
            'Yeoncheon',),
        'Gyeongsangbuk-do' => array(
            'Pohang',
            'Gumi',
            'Gyeongsan',
            'Gyeongju',
            'Andong',
            'Gimcheon',
            'Yeongju',
            'Sangju',
            'Yeongcheon',
            'Mungyeong',
            'Chilgok',
            'Uiseong',
            'Uljin',
            'Yecheon',
            'Cheongdo',
            'Seongju',
            'Yeongdeok',
            'Goryeong',
            'Bonghwa',
            'Cheongsong',
            'Gunwi',
            'Yeongyang',
            'Ulleung',),
        'Gyeongsangnam-do' => array(
            'Changwon',
            'Gimhae',
            'Jinju',
            'Yangsan',
            'Geoje',
            'Tongyeong',
            'Sacheon',
            'Miryang',
            'Haman',
            'Geochang',
            'Changnyeong',
            'Goseong',
            'Namhae',
            'Hapcheon',
            'Hadong',
            'Hamyang',
            'Sancheong',
            'Uiryeong',
        ),
        'Incheon' => array(
            'Bupyeong District',
            'Dong District',
            'Gyeyang District',
            'Jung District',
            'Namdong District',
            'Michuhol District',
            'Seo District',
            'Yeonsu District',
        ),
        'Jeju-do' => array(
            'Jeju', 
            'Seogwipo'
        ),
        'Jeollabuk-do' => array(
            'Jeonju',
            'Iksan',
            'Gunsan',
            'Jeongeup',
            'Gimje',
            'Namwon',
            'Wanju',
            'Gochang',
            'Buan',
            'Sunchang',
            'Imsil',
            'Muju',
            'Jinan',
            'Jangsu',),
        'Jeollanam-do' => array(
            'Yeosu',
            'Mokpo',
            'Suncheon',
            'Gwangyang',
            'Naju',
            'Muan',
            'Haenam',
            'Goheung',
            'Hwasun',
            'Yeongam',
            'Yeonggwang',
            'Wando',
            'Damyang',
            'Boseong',
            'Jangseong',
            'Jangheung',
            'Gangjin',
            'Sinan',
            'Hampyeong',
            'Jindo',
            'Gokseong',
            'Gurye',),
        'Seoul' => array(
            'Dobong District',
            'Dongdaemun District',
            'Dongjak District',
            'Eunpyeong District',
            'Gangbuk District',
            'Gangdong District',
            'Gangnam District',
            'Gangseo District',
            'Geumcheon District',
            'Guro District',
            'Gwanak District',
            'Gwangjin District',
            'Jongno District',
            'Jung District',
            'Jungnang District',
            'Mapo District',
            'Nowon District',
            'Seocho District',
            'Seodaemun District',
            'Seongbuk District',
            'Seongdong District',
            'Songpa District',
            'Yangcheon District',
            'Yeongdeungpo District',
            'Yongsan District',
        ),
        'Ulsan' => array(
            'Buk District',
            'Dong District',
            'Jung District',
            'Nam District',
        ),
    );

    const DISTRICTS = array (
        'Ansan' => array('Danwon-gu','Sangnok-gu'),
        'Anyang' => array('Dongan-gu','Manan-gu'),
        'Changwon' => array(
            'Jinhae-gu',
            'Masanhappo-gu',
            'Masanhoewon-gu',
            'Seongsan-gu',
            'Uichang-gu',
        ),
        'Cheongju' => array(
            'Heungdeok-gu',
            'Sangdang-gu',
            'Cheongwon-gu',
            'Seowon-gu',
        ),
        'Cheonan' => array('Dongnam-gu','Seobuk-gu'),
        'Goyang' => array(
            'Deogyang-gu',
            'Ilsandong-gu',
            'Ilsanseo-gu',
        ),
        'Jeonju' => array(
            'Deokjin-gu',
            'Wansan-gu',
        ),
        'Pohang' => array(
            'Buk-gu',
            'Nam-gu',
        ),
        'Seongnam' => array(
            'Bundang-gu',
            'Jungwon-gu',
            'Sujeong-gu',
        ),
        'Suwon' => array(
            'Gwonseon-gu',
            'Jangan-gu',
            'Paldal-gu',
            'Yeongtong-gu',
        ),
        'Yongin' => array(
            'Cheoin-gu',
            'Giheung-gu',
            'Suji-gu',
        )
    );

    protected $_user_id;

    protected function __construct() {
        $this-> _connection = new \PDO('mysql:host=' .self::HOST. ';dbname='.self::DNAME.';charset=utf8', self::LOGIN, self::PWD);
    }

    public function getUserId() {
        return $this->_user_id;
    }

    public function setUserId($userId) {
        $this->_user_id = $userId;
    }
    
    public function getLangauges($langCode) {
        foreach($this::LANGUAGES as $key=>$language) {
            if ($language == $langCode) {
                return $key;
            }
        }
    }

    public function getCities($province) {
        return !empty($this::CITIES[$province]) ? $this::CITIES[$province] : null;
    }

    public function getDistricts($city) {
        return !empty($this::DISTRICTS[$city]) ? $this::DISTRICTS[$city] : null;
    }
}