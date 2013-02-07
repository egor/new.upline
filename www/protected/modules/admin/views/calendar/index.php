<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/library/jquery-ui-1.9.2.custom/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="/css/colorpicker/colorpicker.css" type="text/css" />
<script type="text/javascript" src="/js/colorpicker/colorpicker.js"></script>
<script type="text/javascript" src="/js/colorpicker/eye.js"></script>
<script type="text/javascript" src="/js/colorpicker/utils.js"></script>
<script type="text/javascript" src="/js/colorpicker/layout.js?ver=1.0.2"></script>
<script type="text/javascript" src="/library/jquery-ui-1.9.2.custom/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js"></script>
<script>    
    $('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
        onSubmit: function(hsb, hex, rgb, el) {
            $(el).val(hex);
            $(el).ColorPickerHide();
        },
        onBeforeShow: function () {
            $(this).ColorPickerSetColor(this.value);
        }
    })
    .bind('keyup', function(){
        $(this).ColorPickerSetColor(this.value);
    });
</script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);
    
        $( "#from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        
        $( "#tabs" ).tabs();
    });
</script>
<script>
    /**
     * ajax смена месяца
     */
    function showMonth(month, year) {
        $.ajax({
            type: "POST",
            url: "/ru/admin/calendar/changeMonth",
            data: "month="+month+"&year="+year,
            beforeSend: function () {
                $("#month-grid").html('загрузка');
            },
            success: function(html) {
                $("#month-grid").html(html);
            }           
        });
        return false;
    }
</script>

<?php
/* @var $this CalendarController */

$this->breadcrumbs = array(
    'Администратирование' => array('/ru/admin/'),
    'Календарь',
);
?>
<h1>Календарь</h1>
<table class="adm_table_calendar_settings">    
    <tr>
        <td class="adm_table_calendar_settings_fixed">Вид: </td>
        <td class="adm_table_calendar_settings_fixed"><a href="/ru/admin/calendar/look?look=list"><span class="adm_ico_32 adm_ico_32_list_num" title="Списком">&nbsp;</span></a></td>
        <td class="adm_table_calendar_settings_fixed"><a href="/ru/admin/calendar/look?look=table"><span class="adm_ico_32 adm_ico_32_calendar_2" title="Календарем">&nbsp;</span></a></td>
        <td class="adm_table_calendar_settings_fixed">Период: </td>
        <?php
        if (isset($_SESSION['calendar']['look']) && $_SESSION['calendar']['look']=='table') {
        ?>
            
            <td>
                <form action="/ru/admin/calendar/">
                    <input type="" id="datepicker"> будет показан выбранный месяц и год <input type="submit">
                </form>
            
            </td>
        <?php
        } else {
        ?>
    <form method="get">
           <td>с <input name="sdate" id="from" value="<?php echo (isset($_GET['sdate'])?$_GET['sdate']:'' ); ?>"></td>
           <td>по <input name="edate" id="to" value="<?php echo (isset($_GET['edate'])?$_GET['edate']:'' ); ?>"></td>
           <td><input type="submit" value="Показать"></td>
           <td><a href="/ru/admin/calendar/">Отменить фильтр</a></td>
           <form>              
        <?php
        }
        ?>
    </tr>
</table>



<div id="tabs">
    <ul>
        <?php
//Ссылки на другие языки
        foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
            //echo '<a href="/ru/admin/news/edit/'.$model->news_primary_id.'/?lang='.$key.'" '.($_GET['lang'] == $key? ' class="current" ' : '').'>'.$value['name'].'</a> ';
            echo '<li><a href="#tabs-' . $key . '">' . $value['name'] . '</a></li>';
        }
        ?>
    </ul>
    <?php
//Ссылки на другие языки
    foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
        //echo '<a href="/ru/admin/news/edit/'.$model->news_primary_id.'/?lang='.$key.'" '.($_GET['lang'] == $key? ' class="current" ' : '').'>'.$value['name'].'</a> ';
        echo '<div id="tabs-' . $key . '">
    <p><a href="/ru/admin/calendar/addEvent/' . $key . '"><span class="adm_ico_32 adm_ico_32_round_checkmark_doc_plus" title="Добавить">&nbsp;</span></a></p>
';
        
        
        echo '<div id="month-grid" style="min-height:700px;">';
        //вывод календаря в зависимости от выбранного типа
        $this->widget('application.components.CalendarTypeLookWidget', array('lang' => $key));
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>