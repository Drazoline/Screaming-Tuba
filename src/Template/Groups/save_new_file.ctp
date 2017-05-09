<?php
if ($status == 'success') {
    echo '<tr>
    <td style="padding-left: 10px;">'. $fileAdd->title. '</td>
    <td>'. $fileAdd->org_filename.'</td>
    <td>'. $username.'</td>
    <td>0</td>

    <td>'.  $this->Html->link(
            'Télécharger',
            '../webroot/files/'.$fileAdd->filename,
            ['class' => 'button', 'target' => '_blank', 'download' =>$fileAdd->org_filename, 'onclick'=> 'console.log("ok")']
        ).'
    </td>
<tr>';
} else {
    echo $status;
}
?>
