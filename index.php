<? $login = 'admin'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Карта. Тестовая версия</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <? include_once('classes/class.php'); ?>
        <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href = "css/style.css">
        <script>
            ymaps.ready(init);
            var map, 
                myPlacemark;

            function init(){ 
                map = new ymaps.Map ("map", {
                    center: [64.54247552, 40.54313129],
                    controls: ['zoomControl'],
                    zoom: 14,
                    behaviors:['default', 'scrollZoom'],
                });
                <?
                $map = new addMap;
                $map->addMarkers();
                ?>

                map.events.add('click', function (e) {
                    <? if ($login == 'admin'){?>
                        if (!map.balloon.isOpen()) {
                            var coords = e.get('coords');
                            ymaps.geocode(coords, {
                                results: 1
                            }).then(function (res) {
                                var newContent = res.geoObjects.get(0) ? res.geoObjects.get(0).properties.get('name') : 'Не удалось определить адрес.';
                                map.balloon.open(coords, {
                                    contentHeader:'Добавить новое место',
                                    contentBody:'<form>' +
                                            '<input type = hidden class = coordX value = ' + [coords[0].toPrecision(6)].join(', ') + '>' + 
                                            '<input type = hidden class = coordY value = ' + [coords[1].toPrecision(6)].join(', ') + '>' +
                                            '<label>Введите адрес: </label><br><input type = text class = address value = ><br>' +
                                            '<label>Введите описание: </label><br><textarea rows = 15 cols = 30 class = "text"></textarea><br>' +
                                        '</form>'
                                    ,
                                    contentFooter:'<input type = "button" class = "add" value = "Добавить">',
                                }, {
                                    minHeight:250,  
                                });
                                $('.address').val(newContent); 
                            })
                        }
                        else {
                            map.balloon.close();
                        }
                    <? } else { ?>

                        if (!map.balloon.isOpen()) {
                            var coords = e.get('coords');
                            map.balloon.open(coords, {
                                contentHeader: 'Добавить новое место',
                                contentBody: 'Чтобы добавить новое место необходимо Войти на сайт!',
                            });
                        }
                        else {
                            map.balloon.close();
                        }                

                  <?  } ?>
                });
            }
        </script>
    </head>

    <body>
        <div id="map" style="width: 100%; height: 800px"></div>
    </body>

</html>

<script>
    
// Добаить ajax
    
</script>