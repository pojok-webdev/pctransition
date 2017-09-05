<h2><?php echo  $uri['day'] . '-' . $uri['month'] . '-' . $uri['year']?></h2>

<?php
echo anchor(base_url() . 'index.php/back_end/show_calendar/month/' . $uri['month'] . '/year/' . $uri['year'],'Back to calendar') . '&nbsp' . '&nbsp';
echo anchor(base_url() . 'index.php/back_end/entry_survey_request/type/add/day/' . $uri['day'] . '/month/' . $uri['month'] . '/year/' . $uri['year'],'Create survey request');
?>
<table>
<thead>
<tr><th>Tanggal</th><th>Client</th><th>Alamat</th></tr>
</thead>
<tbody>
<?php foreach ($survey_requests as $survey_request){?>
<tr>
<td><?php echo $survey_request->survey_date;?></td>
<td><?php echo $survey_request->client_name;?></td>
<td><?php echo anchor(base_url() . 'index.php/back_end/survey_request_detail/id/' . $survey_request->id,'Detail');?></td>
</tr>
<?php }?>

</tbody>
</table>