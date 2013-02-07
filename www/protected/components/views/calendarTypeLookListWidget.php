<?php
        if (!empty($calendar)) {
            echo '<table>
                <tr>
                    <td>id</td>
                    <td>Название</td>
                    <td>Дата проведения</td>
                    <td></td>
                </tr>';
            foreach ($calendar as $val) {
                echo '<tr>
                    <td>' . $val->calendar_id . '</td>
                    <td><a href="/ru/admin/calendar/editEvent/' . $val->calendar_id . '">' . (empty($val->menu_name) ? 'Название пустое' : $val->menu_name) . '</a></td>
                    <td>' . date('d.m.Y', $val->start_date) . ($val->end_date != 0 ? ' - ' . date('d.m.Y', $val->end_date) : '') . '</a></td>                
                    
                    <td>
' . ($val->visibility == 1 ? '<span class="adm_ico adm_ico_round_checkmark" title="видимый">&nbsp;</span>' : '<span class="adm_ico adm_ico_round_minus" title="невидимый">&nbsp;</span>') . '                    
' . (!empty($val->link_to_event) ? '<a href="' . $val->link_to_event . '/" title="перейти"><span class="adm_ico adm_ico_eye">&nbsp;</span></a>' : '<span class="adm_ico adm_ico_no_eye" title="нет url">&nbsp;</span>') . '
<a href="/ru/admin/calebdar/editEvent/' . $val->calendar_id . '" title="редактировать"><span class="adm_ico adm_ico_pencil">&nbsp;</span></a>                        

<a href="/ru/admin/calebdar/deleteEvent/' . $val->calendar_id . '" title="удалить"><span class="adm_ico adm_ico_delete">&nbsp;</span></a>
                    </td>
                    </tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Нет событий</p>';
        }
?>