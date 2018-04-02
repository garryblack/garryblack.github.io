<? include('classes/class.php') ?>

<?print_r($_POST)?>

<div class = addCoordBlock>
    <form>
        <table>
            <tr>
                <td>
                    <lable>Введите координату X</lable>
                </td>
                <td>
                    <input type = 'text' name = 'coordX'>
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Введите координату Y</lable>    
                </td>
                <td>
                    <input type = 'text' name = 'coordX'><br>    
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Введите адрес</lable>    
                </td>
                <td>
                    <input type = 'text' name = 'address'><br>    
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Добавьте изображение</lable>    
                </td>
                <td>
                    <input type = 'file' name = 'img' value = 'a.jpg'><br>    
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Добавьте описание</lable>    
                </td>
                <td>
                    <textarea name = 'text'></textarea>    
                </td>
            </tr>
            <tr>
                <td>
                    <lable>Добавьте статус</lable>    
                </td>
                <td>
                    <select name = status>
                        <option value = 'Активно'>Активно</option>
                        <option value = 'Завершено'>Завершено</option>
                    </select>    
                </td>
            </tr>
        </table>
    </form>
</div>
<div class = "listBlock">
    <table class = list>
        <tr>
            <th>
                Координата X
            </th>
            <th>
                Координата Y
            </th>
            <th>
                Адрес
            </th>
            <th>
                Изображение
            </th>
            <th colspan = 2>
                Описание
            </th>
        </tr>
        <?
            $list = new addMap;
            $array = $list->printList();
            foreach ($array as $element){
                echo '<tr>';
                echo '<td>'.$element['coordinateX'].'</td>';
                echo '<td>'.$element['coordinateY'].'</td>';
                echo '<td>'.$element['address'].'</td>';
                echo '<td>'.$element['photo'].'</td>';
                echo '<td>'.$element['description'].'</td>';
                echo '<td><button>Удалить</button>';
                echo '</tr>';
            }
        ?>
    </table>
</div>

<style>
    .addCoordBlock{
        height:20%;
    }
    .list{
        width: 100%;
    }
    .list td,th{
        border: 1px solid black; 
        padding: 5px;
    }
    .listBlock{
        overflow: auto;
        height: 80%;
    }
</style>