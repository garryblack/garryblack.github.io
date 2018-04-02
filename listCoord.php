<? include('classes/class.php') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href = "css/style.css">

<div class = "listBlock">
    
    <div class = 'sorting allSort'> Все </div>
    <div class = 'sorting activeSort'>Только активные</div>
    <div class = 'sorting noActiveSort'>Только не активные</div>
    
    <table class = list>
        <tr>
            <th>
                ID
            </th>
            <th>
                Активность
            </th>
            <th>
                Координата X
            </th>
            <th>
                Координата Y
            </th>
            <th>
                Адрес
            </th>
<!--
            <th>
                Изображение
            </th>
-->
            <th>
                Описание
            </th>
            <th colspan = 3>
                Статус
            </th>
        </tr>
        <?
            $list = new addMap;
            $array = $list->printList();
            foreach ($array as $element){
                echo '<tr class = "point">';
                echo '<form method = POST action = addCoord.php>';
                echo '<td class = id>'.$element['id'].'</td>';
                echo '<td class = activity>'.$element['activity'].'</td>';
                echo '<td class = coordX>'.$element['coordinateX'].'</td>';
                echo '<td class = coordY>'.$element['coordinateY'].'</td>';
                echo '<td class = address>'.$element['address'].'</td>';
//                echo '<td class = photo><img style = "height: 40px" src='.$element['photo'].'></td>';
                echo '<td class = description>'.$element['description'].'</td>';
                echo '<td class = status>'.$element['status'].'</td>';
                echo '<td><input class = updateCoord  type = button value = Редактировать></td>';
                echo '<td><input class = deleteCoord type = button value = Удалить></td>';
                echo '</form>';
                echo '</tr>';
            }
        ?>
    </table>
</div>

<script>
    var id, activity, coordX, coordY, address, photo, description, status;
    
    $(document).ready(function(){
        
        $('body').on('click', '.updateCoord', function(){
            $('.closeUpdateCoord').click();
            id = $(this).parent().prevAll('.id').text();
            activity = $(this).parent().prevAll('.activity').text();
            coordX = $(this).parent().prevAll('.coordX').text();
            coordY = $(this).parent().prevAll('.coordY').text();
            address = $(this).parent().prevAll('.address').html();
            photo = $(this).parent().prevAll('.photo').children('img').attr('src');
            description = $(this).parent().prevAll('.description').text();
            status = $(this).parent().prevAll('.status').text();
            $(this).parent().prevAll('.activity').html('<select class = newActivity><option value = "Не активно">Не активно</option><option value = "Активно">Активно</option></select>');
            $(this).parent().prevAll('.coordX').html('<input type = text class = newCoordX value = '+coordX+'>'); 
            $(this).parent().prevAll('.coordY').html('<input type = text class = newCoordY value = '+coordY+'>'); 
            $(this).parent().prevAll('.address').html('<input type = text class = newAddress>');
            $('.newAddress').val(address);
//            $(this).parent().prevAll('.photo').html('<input type = "file" class = "newPhoto">');
            $(this).parent().prevAll('.description').html('<textarea class = newDescription>'+description+'</textarea>');
            $(this).parent().prevAll('.status').html('<select class = newStatus><option value = "В работе">В работе</option><option value = "Решено">Решено</option></select>');
            $(this).parent().next().children().css('display', 'none');
            $(this).parent().next().children().after('<input type = "button" class = closeUpdateCoord value = "Отмена">');
            $(this).css('display', 'none');
            $(this).after('<input type = "button" class = saveUpdateCoord value = "Сохранить">');
        })
        
        $('body').on('click', '.closeUpdateCoord', function(){
            $(this).parent().prevAll('.activity').html(activity);
            $(this).parent().prevAll('.coordX').html(coordX); 
            $(this).parent().prevAll('.coordY').html(coordY); 
            $(this).parent().prevAll('.address').html(address);
//            $(this).parent().prevAll('.photo').html('<img style = "height: 40px" src = "'+photo+'">');
            $(this).parent().prevAll('.description').html(description);
            $(this).parent().prevAll('.status').html(status);
            $('.updateCoord').css('display', 'block');
            $('.deleteCoord').css('display', 'block');
            $('.closeUpdateCoord').remove();
            $('.saveUpdateCoord').remove();
        })
        
        $('body').on('click', '.saveUpdateCoord', function(){
            
            // Добавить ajax()
            
            $(this).parent().prevAll('.activity').text($('.newActivity').val()); 
            $(this).parent().prevAll('.coordX').text($('.newCoordX').val()); 
            $(this).parent().prevAll('.coordY').text($('.newCoordY').val()); 
            $(this).parent().prevAll('.address').text($('.newAddress').val()); 
            $(this).parent().prevAll('.description').text($('.newDescription').val()); 
            $(this).parent().prevAll('.status').text($('.newStatus').val()); 
            $('.updateCoord').css('display', 'block');
            $('.deleteCoord').css('display', 'block');
            $('.closeUpdateCoord').remove();
            $('.saveUpdateCoord').remove();
        })
        
        $('body').on('click', '.deleteCoord', function(){
            
            // Добавить ajax()
            
            $(this).parent().parent().remove(); 
        })
        
        $('.allSort').click(function(){
            $('.point').css('display','table-row');  
        })
        
        $('.activeSort').click(function(){
            $('.point').css('display','none');
            $('.point').each(function(){
               if($(this).children('.activity').text() == 'Активно'){
                   $(this).css('display', 'table-row')
               }
            })   
        })
        
        $('.noActiveSort').click(function(){
            $('.point').css('display','none');
            $('.point').each(function(){
               if($(this).children('.activity').text() == 'Не активно'){
                   $(this).css('display', 'table-row')
               }
            })   
        })
        
        
        
    })
</script>


