<?php

/**
 * Вывод календаря в виде таблицы
 */

echo '<center><a href="#" onClick="showMonth(' . date('m,Y') . '); return false;">сегодня</a>
    <a href="#" onClick="showMonth(' . date('m,Y', mktime(0, 0, 0, ($month - 1), 1, $year)) . '); return false;"><- Туда</a>
    <b>'.$month.' '.$year.'</b>
    <a href="#" onClick="showMonth(' . date('m,Y', mktime(0, 0, 0, ($month + 1), 1, $year)) . '); return false;">Сюда -></a>
    </center>
    <br />
    <br />
';
echo '<table class="adm_table_calendar">';
for ($i = 0; $i < count($week); $i++) {
    echo '<tr>';
    for ($j = 0; $j < 7; $j++) {
        if (!empty($week[$i][$j])) {
            $event = '';
            foreach ($calendar as $value) {
                if ($value->start_date == mktime(0, 0, 0, $month, $week[$i][$j], $year)) {
                    $event .= '<br />';
                    $event .= '<a href="/ru/admin/calendar/editEvent/' . $value->calendar_id . '" title="редактировать">' . $value->menu_name . '</a><br />';
                }
            }
            $event .= '<a href="/ru/admin/calendar/addEvent/' . $lang . '/?start=' . mktime(0, 0, 0, $month, $week[$i][$j], $year) . '" class="adm_table_calendar_add">добавить</a>';

            // Если имеем дело с субботой или воскресеньем, то подсвечиваем их
            if ($j == 5 || $j == 6) {
                echo '<td class="day_off"><span class="date_header">' . $week[$i][$j] . '</span>' . $event . '</td>';
            } else {
                echo '<td class="m_day"><span class="date_header">' . $week[$i][$j] . '</span>' . $event . '</td>';
            }
        }
        else
            echo '<td class="other_day"><a href="#" onClick="showMonth(' . ($j == 0 ? date('m,Y', mktime(0, 0, 0, ($month - 1), 1, $year)) : date('m,Y', mktime(0, 0, 0, ($month + 1), 1, $year))) . ')" class="adm_table_calendar_other_day_a">&nbsp;</a></td>';
    }
    echo '</tr>';
}
echo '</table>';