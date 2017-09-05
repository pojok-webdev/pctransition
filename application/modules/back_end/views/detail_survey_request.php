<table>
  <tr>
    <td style='width:10%'>Client</td><td>:</td><td><?php echo $survey_request->client->name;?></td>
  </tr>
  <tr>
    <td>PIC Name</td><td>:</td><td><?php echo $survey_request->pic_name;?></td>
  </tr>
  <tr>
    <td>Position</td><td>:</td><td><?php echo $survey_request->pic_position;?></td>
  </tr>
  <tr>
    <td>Phone</td><td>:</td><td><?php echo $survey_request->pic_phone;?></td>
  </tr>
</table>

<h2>Alamat survey :</h2>
<table>
<thead>
<tr>
<th>Alamat</th><th>Phone</th><th>Fax</th>
</tr>
</thead>
<tbody>
<?php foreach($client_sites as $request){?>
<tr>
<td><?php echo $request->address;?></td>
<td><?php echo $request->phone_area . ' ' . $request->phone?></td>
<td><?php echo $request->fax_area . ' ' . $request->fax?></td>
</tr>
<?php }?>
</tbody>
</table>
<?php
