<?

class addMap
{
    function __construct(){
      //  echo 'Подключение к базе данных';
    }
    
    private $arr = [
    
        'TEST' => [
            'id' => 1,
            'activity' => 'Активно',
            'coordinateX' => '64.54247552', 
            'coordinateY' => '40.54313150',
            'address' => 'Володарского 79, к1',
//            'photo' => 'a.jpg',
            'description' => 'Большая куча мусора у подъезда',
            'status' => 'В работе'
        ],

        'TEST2' => [
            'id' => 2,
            'activity' => 'Активно',
            'coordinateX' => '64.54247552', 
            'coordinateY' => '40.56312115',
            'address' => 'Стрелковая 12',
//            'photo' => 'a.jpg',
            'description' => 'Не убирается мусор',
            'status' => 'Решено'
        ],
        
        'TEST3' => [
            'id' => 3,
            'activity' => 'Не активно',
            'coordinateX' => '64.55247552', 
            'coordinateY' => '40.5713150',
            'address' => 'Дзержинского 6',
//            'photo' => 'a.jpg',
            'description' => 'Тараканы!',
            'status' => 'Решено'
        ],

    ];
    
    public function addMarkers(){
        foreach($this->arr as $element){
            if($element['activity'] == 'Активно'){
                $status = $this->status($element[status]);
                echo("
                        myPlacemark$element[id] = new ymaps.Placemark([$element[coordinateX], $element[coordinateY]], { 
                        hintContent: '$element[name]', 
                        balloonContentHeader: '$element[address]',
                        balloonContentBody: '<div class = decriptionPopup>$element[description]</div>',
                        balloonContentFooter:'<div>Статус: $element[status]</div>'
                        },{
                        balloonMinWidth: 300,
                        balloonMaxWidth: 300,
                        balloonMinHeight: 200,
                        balloonMaxHeight: 400,
                        preset: '$status',
                        }
                    );
                    map.geoObjects.add(myPlacemark$element[id]);
                ");
            }
        }   
        
    }
    
    public function printList(){
        return $this->arr;
    }
    
    private function status($status){
        switch ($status){
            case 'В работе':
                return 'twirl#redDotIcon'; break;
            case 'Решено':
                return 'twirl#greenDotIcon'; break;
        }
    }
}

//balloonContentBody:'<img class = imgPopup src=$element[photo]>',
?>