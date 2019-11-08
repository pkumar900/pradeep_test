
<section class="content">
    <div class="container-fluid">
       
    <?php if($this->session->flashdata('msg')==1)
      {
          echo '<div class="alert alert-success"> Added successfully.</div>';
      }
      else if($this->session->flashdata('msg')==2) {
         echo '<div class="alert alert-success">Updated successfully.</div>';
      }
      else if($this->session->flashdata('msg')==3) {
        echo '<div class="alert alert-danger"><strong>Oops!</strong>Something Went Wrong.</div>';
     }
       ?>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                          Schools
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <div class="col-md-1">
                             <a href="<?= base_url('Schools/create')?>" class="btn btn-primary waves-effect">Add School</a>
                         </div>
                     </ul>
                 </div>
                 <br>
                  <?= form_open('Schools',array('class' => 'form')); ?>
                  <div class="row clearfix">
		            <div class="col-sm-4">
		              <div class="form-group">
		                <div class="form-line">
		                  <input type="text" name="name" class="form-control" value="<?= set_value('name')?>" placeholder="Name" />
		                </div>
		                <?= form_error('name')?>
		                <!-- <span></span> -->
		              </div>
		            </div>
		             <div class="col-md-2">
              <button type="submit" class="btn btn-primary waves-effect">Search</button>

            </div>
		          </div>
		           <?= form_close()?>
                 <div class="body">
                    <div class="table-responsive">
                     <table >
                        <thead>
                            <tr>
                                <th>&nbsp;&nbsp;&nbsp;Sr.&nbsp;&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;Courses&nbsp;&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;Added date&nbsp;&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;Updated Date&nbsp;&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                        </thead>
                        <br><br>
                        <tbody>
                         <?php $count=1; foreach($all_school as $key=>$value) {?>
                           <tr id="row<?=$value->id?>">
                            <td><?= $count++; ?></td>
                            <td><?= $value->name ?></td>
                            <td><?= !empty($value->course)?$value->course:'N/A'; ?></td>
                            <td><?= $value->added_date ?></td>
                            <td><?= $value->updated_date ?></td>
                            <td><a href="<?= base_url('Schools/edit/'.base64_encode($value->id))?>" class="btn btn-primary waves-effect">Edit</a>
                               <a class="btn btn-danger"  data-toggle="tooltip" data-original-title="Delete School" onclick="delete_data('<?=base_url('Schools/delete') ?>','<?= base64_encode($value->id); ?>')">
                                  <i class="material-icons">delete_forever</i>
                              </a>
                              <a href="<?= base_url('Schools/view/'.base64_encode($value->id))?>" class="btn btn-primary waves-effect">view</a>

                            </tr>

                        <?php   } ?>
                    </tbody>
                </table>
                <?php
                
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_tag_open'] = '<li><a>';
                $config['first_tag_close'] = '</a></li>';
                $config['last_tag_open'] = '<li><a>';
                $config['last_tag_close'] = '</a></li>';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['next_link'] = '<span> Next <i class="fa fa-angle-double-right" aria-hidden="true"></i> </span>';
                $config['prev_link'] = '<span><i class="fa fa-angle-double-left" aria-hidden="true"></i> Previous</span>';
                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '</a></li>';
                $this->pagination->initialize($config);
                echo $this->pagination->create_links();
                
                ?>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</section>