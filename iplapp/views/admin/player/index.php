<div class="panel panel-flat">    <div class="panel-heading">    </div>    <div class="panel-body">        <div class="full-width mt-15p">            <?php if (!empty($result)) { ?>                <table class="table table-bordered table-framed">                    <tr>                        <th>SI No</th>                        <th>Name</th>                        <th>Team</th>                        <th>Designation</th>                        <th>Address</th>                        <th>Status</th>                        <th>Image</th>                        <th>Action</th>                    </tr>                    <?php                    foreach ($result as $r => $item) :                        ?>                        <tr>                            <td><?php echo ++$page ?></td>                            <td><?php echo word_limiter($item->name, 5); ?></td>                            <td><?php echo $item->team_name; ?></td>                            <td><?php echo $item->designation; ?></td>                            <td><?php echo nl2br($item->about); ?></td>                            <td><?php echo ($item->status == 'Y' ? 'Active' : 'Inactive') ?></td>                            <td >                                <?php if (isset($item->image) && $item->image != '') { ?>                                    <div class="image-list">                                        <a class="icon-image2 black_txt"></a>                                        <span class="img-view">                                            <img src="<?php echo base_url() . $hrdata['imagepath'] . '/' ?><?php echo $item->image ?>" width="120" class="left-float mr-10p" alt="icon">                                        </span>                                    </div>                                <?php } ?>                            </td>                            <td>                                <a href="<?php echo base_url($hrdata['controller'] . '/edit/' . $item->id) ?>" title="Edit" class="icon-pencil7"></a>                                <a href="<?php echo base_url($hrdata['controller'] . '/delete/' . $item->id) ?>" title="Delete" class="icon-bin" onclick="return confirm('Are you sure you want to delete?')"></a>                            </td>                        </tr>                    <?php endforeach ?>                </table>            <?php } else { ?>                <div class="pl-30p ptb-20p">                    No Records Found!                </div>            <?php } ?>           </div>        <div class="mt-15p">            <?php if (isset($pagination)) { ?>                <div style="float:right">                    <?php echo $pagination; ?>                </div>            <?php } ?>        </div>    </div></div>