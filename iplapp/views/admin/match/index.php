<div class="panel panel-flat">    <div class="panel-heading">            </div>    <div class="panel-body"><div class="full-width mt-15p">    <?php if (!empty($result)) { ?>        <table class="table table-bordered table-framed">            <tr>                <th>Sl No</th>                <th>Date</th>                <th>Home Team</th>                <th>Away Team</th>                <th>Winner</th>                <th>Action</th>            </tr>            <?php            foreach ($result as $r => $item) :                ?>                <tr>                    <td><?php echo ++$page ?></td>                    <td><?php echo date('m/d/Y',strtotime($item->date)); ?></td>                    <td><?php echo $item->home;  ?></td>                    <td><?php echo $item->away;  ?></td>                    <td><?php echo $item->winner_team;  ?></td>                    <td>                        <a href="<?php echo base_url($hrdata['controller'].'/edit/' . $item->id) ?>" title="Edit" class="icon-pencil7"></a>                       <a href="<?php echo base_url($hrdata['controller'].'/delete/' . $item->id) ?>" title="Delete" class="icon-bin" onclick="return confirm('Are you sure you want to delete?')"></a>                    </td>                </tr>            <?php endforeach ?>        </table>    <?php } else { ?>        <div class="pl-30p ptb-20p">            No Records Found!        </div>    <?php } ?>    </div><div class="mt-15p">    <?php if (isset($pagination)) { ?>        <div style="float:right">            <?php echo $pagination; ?>        </div>    <?php } ?></div>    </div></div>