<table class="table table-bordered">
    <tr>
        <td>#</td>
        <td>Status</td>
        <td>Comment</td>
        <td>Date</td>
        <td>Created By</td>
    </tr>
    <?php
    $i=0;
    if($recruiterNotes){
    foreach ($recruiterNotes as $notes){
        $User=\common\models\User::findOne($notes->created_by);
        $i++;
        ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo ($notes->status == 1)?'Eligible':'Not Eligible'?></td>
            <td><?php echo $notes->comment?></td>
            <td><?php echo date('d-m-Y',strtotime($notes->created_date))?></td>
            <td><?php echo $User->username .' ('.$User->email.')'?></td>
        </tr>
        <?php } }else{?>
            <tr>
                <td>No notes found</td>
            </tr>
            <?php }?>
</table>