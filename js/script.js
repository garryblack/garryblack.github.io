ymaps.ready(init);
var myMap, 
    myPlacemark;

function init(){ 
    map = new ymaps.Map ("map", {
        center: [64.54247552, 40.54313129],
        zoom: 14,
        behaviors:['default', 'scrollZoom']
    });

}