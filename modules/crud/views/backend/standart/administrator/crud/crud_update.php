<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET; ?>css/crud.css">
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script src="<?= BASE_ASSET; ?>/float-thead/jquery.floatThead.min.js"></script>
<script type="text/javascript">
   //This page is a result of an autogenerated content made by running test.html with firefox.
   function domo(){
    
      // Binding keys
      $('*').bind('keydown', 'Ctrl+s', function assets() {
         $('#btn_save').trigger('click');
          return false;
      });
   
      $('*').bind('keydown', 'Ctrl+x', function assets() {
         $('#btn_cancel').trigger('click');
          return false;
      });
   
     $('*').bind('keydown', 'Ctrl+d', function assets() {
         $('.btn_save_back').trigger('click');
          return false;
      });
       
   }
   
   jQuery(document).ready(domo);
</script>


<?php $this->load->view('backend/standart/administrator/crud/crud_config_component') ?>

<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Crud
      <small><?= cclang('update', ['Crud']); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?= cclang('home'); ?></a></li>
      <li class=""><a  href="<?= site_url('administrator/crud'); ?>">Crud</a></li>
      <li class="active"><?= cclang('update'); ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="Crud Avatar">
                     </div>
                     <!-- /.widget-crud-image -->
                     <h3 class="widget-user-username">Crud</h3>
                     <h5 class="widget-user-desc"><?= cclang('update', ['Crud']); ?></h5>
                     <hr>
                  </div>
                  <?= form_open('', [
                     'name'    => 'form_crud', 
                     'class'   => 'form-horizontal', 
                     'id'      => 'form_crud', 
                     'method'  => 'POST'
                     ]); ?>

                  <input type="hidden" name="table_name" id="table_name" value="<?=$crud->table_name; ?>">
                  <input type="hidden" class="primary_key" name="primary_key"  id="primary_key" value="<?= $crud->primary_key; ?>" >



                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('table_name'); ?> </label>
                     <div class="col-sm-8">
                        <input type="text" readonly="" class="form-control" value="<?= $crud->table_name; ?>">
                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('subject'); ?> <i class="required">*</i></label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= set_value('subject', $crud->subject); ?>">
                        <small class="info help-block">The subject of crud.</small>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('title'); ?> </label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= set_value('title', $crud->title); ?>">
                        <small class="info help-block">The title of crud.</small>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('page'); ?></label>
                     <div class="col-sm-7">
                        <div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_create" type="checkbox" id="create" value="yes" name="create" <?= $crud->page_create == 'yes' ? 'checked' : ''; ?>> <?= cclang('create'); ?>
                          </label>
                        </div>
                        <div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_read" type="checkbox" id="read" value="yes" name="read" <?= $crud->page_read == 'yes' ? 'checked' : ''; ?>> <?= cclang('read'); ?> 
                          </label>
                        </div>
                        <div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_update" type="checkbox" id="update" value="yes" name="update" <?= $crud->page_update == 'yes' ? 'checked' : ''; ?>> <?= cclang('update'); ?>
                          </label>
                        </div>
                     </div>
                  </div>

                  <hr>
                  <div class="wrapper-crud">
                   <table class="table table-responsive table table-bordered table-striped"  id="diagnosis_list">
                     <thead>
                        <tr>
                           <th width="20" rowspan="2" valign="midle" style="vertical-align: middle; text-align: center;">No</th>
                           <th width="120" rowspan="2" valign="midle" style="vertical-align: middle; text-align: center;"><?= cclang('field'); ?></th>
                           <th width="80" colspan="4" style="text-align: center;"><?= cclang('show_in'); ?></th>
                           <th width="100" rowspan="2" valign="midle" style="vertical-align: middle; text-align: center;"><?= cclang('input_type'); ?></th>
                           <th width="200" rowspan="2" valign="midle" style="vertical-align: middle; text-align: center;"><?= cclang('validation'); ?></th>
                        </tr>
                        <tr>
                           <th width="60" class="module-page-list column" style="vertical-align: middle; text-align: center;"><?= cclang('column'); ?></th>
                           <th width="60" class="module-page-add add_form" style="vertical-align: middle; text-align: center;"><?= cclang('add_form'); ?></th>
                           <th width="60" class="module-page-update update_form" style="vertical-align: middle; text-align: center;"><?= cclang('update_form'); ?></th>
                           <th width="60" class="detail_page" style="vertical-align: middle; text-align: center;"><?= cclang('detail_page'); ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i=0; foreach ($crud_field as $row):  $i++; ?>
                        
                        <tr <?= isset($row->new_field) ? 'class="new-field"' : ''; ?>>
                           <td  class="">
                              <i class="fa fa-bars dragable fa-lg text-muted"></i>
                              <input type="hidden" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][sort]" class="priority" value="<?= $i; ?>" >
                              <input type="hidden" class="crud-id" id="crud-id" value="<?= $i; ?>" >
                              <input type="hidden" class="crud-name" id="crud-name" value="<?= $row->field_name; ?>" >
                              <?php  if($crud->primary_key != $row->field_name): ?>
                              <?= $this->load->view('backend/standart/administrator/crud/crud_button_config'); ?>
                              <?php endif ?>
                              
                           </td>
                           <td>

                           <div style="margin-bottom: -10px;">
                           <?= isset($row->new_field) ? '<span class="label label-danger pull-right" style="margin-bottom:-20px; margin-left:-5px; position:relative"><i class="fa  fa-info-circle"></i> new field</span>' : ''; ?>

                              <span class="fa fa-trash text-danger btn-remove-field " style="margin-top:-20px; left:0px;  position:relative; cursor: pointer;"></span>
                           </div>
                              <input type="text" class="crud-input-initial" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][label]" placeholder="<?= $row->field_name; ?>" value="<?= $row->field_label; ?>">
                              
                              <div class="config-item-wrapper">
                                 <?php foreach ((array)@$field_configuration[$row->id] as $type => $configs): ?> 


                                 <?php foreach ($configs as $cfg):  ?> 
                                 <?php if ($type=='stepper' ):  ?>
                                 <div class="config-item" data-type="stepper">
                                    <span class="config-label"><i class="fa fa-cog btn-config"></i> stepper</span>
                                    <a href="#" class="pull-right btn-remove-config"><i class="fa fa-trash"></i></a>
                                    <div><input 
                                    name="crud[<?=$i; ?>][<?= $row->field_name; ?>][configs][stepper][title]" type="text" placeholder="step title" value="<?= $cfg->config_value ?>" class="input-setting"></div>
                                </div>
                                <?php elseif($type == 'strict'):  ?>

                                 <div class="config-item" data-type="strict">
                                 <span class="config-label"><i class="fa fa-cog btn-config"></i> strict</span>
                                    <a href="#" class="pull-right btn-remove-config"><i class="fa fa-trash"></i></a>
                                 <select  class="form-control strict-group chosen-select "name="crud[<?=$i; ?>][<?= $row->field_name; ?>][configs][strict][groups][]" id="group" multiple data-placeholder="Select groups">
                                    <?php foreach (db_get_all_data('aauth_groups') as $group): ?>
                                    <option  <?= array_search($group->id, explode(',', $cfg->config_value)) !== false? 'selected="selected"' : ''; ?> value="<?= $group->id; ?>"  ><?= ucwords($group->name); ?></option>
                                    <?php endforeach; ?>  
                                 </select>
                                 <small>Only selected group can see this field</small>
                                </div>
                                <?php endif ?>
                                 <?php endforeach ?>
                                 <?php endforeach ?>
                              </div>

                           </td>
                           <td class="column">
                              <input class="flat-red check" type="checkbox" <?= $row->show_column == 'yes' ? 'checked' : ''; ?> name="crud[<?=$i; ?>][<?=$row->field_name; ?>][show_in_column]" value="yes">
                           </td>
                           <td class="add_form">
                              <input class="flat-red check" type="checkbox" <?= $row->show_add_form == 'yes' ? 'checked' : ''; ?> name="crud[<?=$i; ?>][<?=$row->field_name; ?>][show_in_add_form]" value="yes">
                           </td>
                           <td class="update_form">
                              <input class="flat-red check" type="checkbox" <?= $row->show_update_form == 'yes' ? 'checked' : ''; ?> name="crud[<?=$i; ?>][<?=$row->field_name; ?>][show_in_update_form]" value="yes">
                           </td>
                           <td class="detail_page">
                              <input class="flat-red check" type="checkbox" <?= $row->show_detail_page == 'yes' ? 'checked' : ''; ?> name="crud[<?=$i; ?>][<?=$row->field_name; ?>][show_in_detail_page]" value="yes">
                           </td>
                           <td>
                              <div class="col-md-12">
                                 <div class="form-group ">
                                    <select  class="form-control chosen chosen-select input_type" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][input_type]" id="input_type" tabi-ndex="5" data-placeholder="Select Type" >
                                       <option value="" class="<?= $this->model_crud->get_input_type(); ?>"></option>
                                       <?php foreach (db_get_all_data('crud_input_type') as $input):  ?>
                                       <option  value="<?= $input->type; ?>" class="<?= $input->type; ?>" title="<?= $input->validation_group; ?>" relation="<?= $input->relation; ?>" custom-value="<?= $input->custom_value; ?>" <?= $input->type == $row->input_type ? 'selected="selected"' : ''; ?> ><?= ucwords(clean_snake_case($input->type)); ?></option>
                                       <?php endforeach; ?>
                                    </select>
                                 </div>
                              </div>


                              <?php if (isset($crud_field_option[$row->id])): ?>
                              <div class="custom-option-container ">
                                 <div class="custom-option-contain">
                              <?php 
                              $j = 0; 
                              foreach ($crud_field_option[$row->id] as $option) {
                                 $j++;
                              ?>
                                    <div class="custom-option-item">
                                       <div class="box-custom-option padding-left-0 box-top">     
                                          <div class="col-md-3"><?= cclang('value'); ?></div>  <input type="text" name="crud[<?=$i; ?>][<?= $row->field_name; ?>][custom_option][<?= $j; ?>][value]" value="<?= $option->option_value; ?>"></label>
                                       </div>
                                       <div class="box-custom-option padding-left-0 box-bottom"> 
                                          <div class="col-md-3"><?= cclang('label'); ?></div>  <input type="text" name="crud[<?=$i; ?>][<?= $row->field_name; ?>][custom_option][<?= $j; ?>][label]" value="<?= $option->option_label; ?>">
                                       </div>
                                       <a class="text-red delete-option fa fa-trash" data-original-title="" title=""></a> 
                                    </div>
                              <?php 
                              }
                               ?>
                                 </div>
                               <a class="box-custom-option input btn btn-flat btn-block bg-black  add-option"> 
                               <i class="fa fa-plus-circle"></i> <?= cclang('add_new_option'); ?>
                              </a>
                              </div>
                              <?php else: ?>
                              <div class="custom-option-container display-none">
                                 <div class="custom-option-contain">
                                    <div class="custom-option-item">
                                       <div class="box-custom-option padding-left-0 box-top"> 
                                          <div class="col-md-3"><?= cclang('value'); ?></div>  <input type="text" name="crud[<?=$i; ?>][<?= $row->field_name; ?>][custom_option][0][value]"></label>
                                       </div>
                                       <div class="box-custom-option padding-left-0 box-bottom"> 
                                          <div class="col-md-3"><?= cclang('label'); ?></div>  <input type="text" name="crud[<?=$i; ?>][<?= $row->field_name; ?>][custom_option][0][label]">
                                       </div>
                                       <a class="text-red delete-option fa fa-trash" data-original-title="" title=""></a> 
                                    </div>
                                 </div>
                                  <a class="box-custom-option input btn btn-flat btn-block bg-black  add-option"> 
                                  <i class="fa fa-plus-circle"></i> <?= cclang('add_new_option'); ?>
                                 </a>
                              </div>
                              <?php endif; ?>

                              <?php if (!empty($row->relation_table)): ?>
                              <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group" >
                                    <label><small class="text-muted"><?= cclang('table_reff'); ?></small></label>
                                    <select  class="form-control chosen chosen-select relation_table relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][relation_table]" id="relation_table" tabi-ndex="5" data-placeholder="Select Table" >
                                       <option value=""></option>
                                        <?php foreach (array_diff($this->db->list_tables(), get_table_not_allowed_for_builder()) as $table): ?>
                                       <option <?= $row->relation_table == $table ? 'selected' : ''; ?> value="<?= $table; ?>"><?= $table; ?></option>
                                       <?php endforeach; ?>  
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group ">
                                    <label><small class="text-muted"><?= cclang('value_field_reff'); ?></small></label>
                                    <select  class="form-control chosen chosen-select relation_value relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][relation_value]" id="relation_value" tabi-ndex="5" data-placeholder="Select ID" >
                                       <option value=""></option>
                                       <?php foreach ($this->db->list_fields($row->relation_table) as $field){ ?>
                                       <option <?= $row->relation_value == $field ? 'selected' : ''; ?> value="<?= $field; ?>"><?= ucwords($field); ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group ">
                                    <label><small class="text-muted"><?= cclang('label_field_reff'); ?></small></label>
                                    <select  class="form-control chosen chosen-select relation_label relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][relation_label]" id="relation_label" tabi-ndex="5" data-placeholder="Select Label" >
                                       <option value=""></option>
                                       <?php foreach ($this->db->list_fields($row->relation_table) as $field){ ?>
                                       <option <?= $row->relation_label == $field ? 'selected' : ''; ?> value="<?= $field; ?>"><?= ucwords($field); ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <?php if ($input->type == 'chained'):  ?>
                                 <hr>
                                 <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group ">
                                    <label><small class="text-muted"><?= cclang('where'); ?></small></label>
                                    <select  class="form-control chosen chosen-select-deselect relation_label relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][chain_field]" id="chain_field" tabi-ndex="5" data-placeholder="Select Label" >
                                       <option value=""></option>
                                       <?php foreach ($this->db->list_fields($row->relation_table) as $field){ ?>
                                       <option 
                                       <?= $crud_field_chain[$row->id]->chain_field ==  $field ? 'selected' : '' ?> value="<?= $field; ?>"><?= ucwords($field); ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div>
                                 <center>=</center>
                              </div>
                                <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group ">
                                    <label><small class="text-muted"></small></label>
                                    <select  class="form-control chosen chosen-select-deselect  " name="crud[<?=$i; ?>][<?=$row->field_name; ?>][chain_field_eq]" id="chain_field_eq" tabi-ndex="5" data-placeholder="Select Label" >
                                       <option value=""></option>
                                       <?php foreach ($this->db->list_fields($crud->table_name) as $field){ ?>
                                       <option <?= $crud_field_chain[$row->id]->chain_field_eq ==  $field ? 'selected' : '' ?> <?= $row->relation_label == $field ? 'selected' : ''; ?>
                                        value="<?= $field; ?>"><?= ucwords($field); ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>


                              <?php endif ?>
                              <?php else : ?>
                                 <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group display-none ">
                                    <label><small class="text-muted"><?= cclang('table_reff'); ?></small></label>
                                    <select  class="form-control chosen chosen-select relation_table relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][relation_table]" id="relation_table" tabi-ndex="5" data-placeholder="Select Table" >
                                       <option value=""></option>
                                        <?php foreach (array_diff($this->db->list_tables(), get_table_not_allowed_for_builder())  as $table): ?>
                                       <option value="<?= $table; ?>"><?= $table; ?></option>
                                       <?php endforeach; ?>  
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group display-none ">
                                    <label><small class="text-muted"><?= cclang('value_field_reff'); ?></small></label>
                                    <select  class="form-control chosen chosen-select relation_value relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][relation_value]" id="relation_value" tabi-ndex="5" data-placeholder="Select ID" >
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group display-none ">
                                    <label><small class="text-muted"><?= cclang('label_field_reff'); ?></small></label>
                                    <select  class="form-control chosen chosen-select relation_label relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][relation_label]" id="relation_label" tabi-ndex="5" data-placeholder="Select Label" >
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                                <hr>
                                 <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group display-none ">
                                    <label><small class="text-muted"><?= cclang('where'); ?></small></label>
                                    <select  class="form-control chosen chosen-select-deselect relation_label relation_field" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][chain_field]" id="chain_field" tabi-ndex="5" data-placeholder="Select Label" >
                                       <option value=""></option>
                                    </select>
                                 </div>
                              </div>
                             
                                <div class="col-md-12" style="margin:0px !important">
                                 <div class="form-group display-none ">
                                    <div>
                                       <center>=</center>
                                    </div>
                                    <label><small class="text-muted"></small></label>
                                    <select  class="form-control chosen chosen-select-deselect chain_field_eq  " name="crud[<?=$i; ?>][<?=$row->field_name; ?>][chain_field_eq]" id="chain_field_eq" tabi-ndex="5" data-placeholder="Select Label" >
                                       <option value=""></option>
                                       <?php foreach ($this->db->list_fields($crud->table_name) as $field){ ?>
                                       <option value="<?= $field; ?>"><?= ucwords($field); ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <?php endif; ?>
                           </td>
                           <td>
                              <div class="col-md-12">
                                 <div class="form-group ">
                                    <select  class="form-control chosen chosen-select validation" name="crud[<?=$i; ?>][<?=$row->field_name; ?>][validation]" id="validation" tabi-ndex="5" data-placeholder="+ <?= cclang('add_rules') ?>">
                                        <option value="" class="input file number text datetime select"></option>
                                        <?php 
                                        foreach (db_get_all_data('crud_input_validation') as $input): 
                                        ?>
                                          <option value="<?= $input->validation; ?>" class="<?= str_replace(',', ' ', $input->group_input); ?>" data-group-validation="<?= str_replace(',', ' ', $input->group_input); ?>" data-placeholder="<?= $input->input_placeholder; ?>" title="<?= $input->input_able; ?>"><?= ucwords(clean_snake_case($input->validation)); ?></option>
                                         <?php endforeach; ?> 
                                    </select>
                                 </div>
                              </div>
                              <?php if (isset($crud_field_validation[$row->id])): 
                              foreach ($crud_field_validation[$row->id] as $rule) {
                              ?>
                              <div class="box-validation <?= str_replace(',', ' ', $rule->group_input).' '.$rule->validation_name; ?>"> 
                                <label><div class="validation-name<?= $rule->input_able == 'yes' ? '' : '-max'; ?>"><?= clean_snake_case($rule->validation); ?></div> 
                                <input class="input_validation" name="crud[<?=$i; ?>][<?= $row->field_name; ?>][validation][rules][<?= $rule->validation; ?>]" type="<?= $rule->input_able == 'yes' ? 'text' : 'hidden'; ?>" value="<?= $rule->validation_value; ?>"></label> <a class="delete fa fa-trash"></a> 
                              </div>
                              <?php 
                               }
                              endif; ?>
                           </td>
                        </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
                    
                  </div>
                  <div class="validation_rules" style="display: none">
                     <option value="" class="<?= $this->model_crud->get_input_type(); ?>"></option>
                     <?php foreach (db_get_all_data('crud_input_validation') as $input): ?>
                       <option value="<?= $input->validation; ?>" class="<?= str_replace(',', ' ', $input->group_input); ?>" title="<?= $input->input_able; ?>" data-placeholder="<?= $input->input_placeholder; ?>" ><?= ucwords(clean_snake_case($input->validation)); ?></option>
                      <?php endforeach; ?> 
                  </div>
                  <div class="message no-message-padding">
                  </div>
                  <div class="view-nav">
                     <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)"><i class="fa fa-save" ></i> <?= cclang('save_button'); ?></button>
                     <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)"><i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?></a>
                     <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)"><i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?></a>
                     <span class="loading loading-hide"><img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i><?= cclang('loading_saving_data'); ?></i></span>
                  </div>
                  <?= form_close(); ?>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
   <?= $this->load->view('backend/standart/administrator/crud/crud_toolbox') ?>
</section>
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<script src="<?= BASE_ASSET; ?>js/crud.js"></script>
<!-- Page script -->
<script>
$(document).ready(function() {

   $('.btn-remove-field').click(function(event) {
      var btn = $(this);
        swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               btn.parents('tr').fadeOut(function(){
                  $(this).remove();
               });
            }
          });
    
        return false;
   });
    $('.input_type').trigger('chosen:updated');

    //update validation
    $(document).find('table tr .input_type').each(function() {
        updateValidation($(this));
    });

    //Make diagnosis table sortable
    $(document).find("#diagnosis_list tbody").sortable({
        helper: fixHelperModified,
        handle: '.fa-bars',
        start: function() {
            $(this).addClass('target-area');
        },
        stop: function(event, ui) {
            renumber_table('#diagnosis_list');
        }
    });

    $(document).find("#diagnosis_list tbody").sortable({
        helper: fixHelperModified,
        stop: function(event, ui) {
            renumber_table('#diagnosis_list')
        }
    });

    /*frezee thead row*/
    $(document).find('table#diagnosis_list').floatThead({
        useAbsolutePositioning: true,
    });

    $('.btn_save').click(function() {
        $('.message').hide();

        var form_crud = $('#form_crud');
        var data_post = form_crud.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({
            name: 'save_type',
            value: save_type
        });
        $('.loading').show();

        $.ajax({
                url: BASE_URL + '/administrator/crud/edit_save/' + <?= $crud->id; ?> ,
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                if (res.success) {

                    if (save_type == 'back') {
                        window.location.href = res.redirect;
                        return;
                    }

                    $('.message').printMessage({
                        message: res.message
                    });
                    $('.message').fadeIn();

                } else {
                    $('.message').printMessage({
                        message: res.message,
                        type: 'warning'
                    });
                    $('.message').fadeIn();
                }

            })
            .fail(function() {
                $('.message').printMessage({
                    message: 'Error save data',
                    type: 'warning'
                });
            })
            .always(function() {
                $('.loading').hide();
                $('html, body').animate({
                    scrollTop: $(document).height()
                }, 3000);
            });

        return false;
    }); /*end btn save*/

    //Helper function to keep table row from collapsing when being sorted
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        return $helper;
    };

    //Renumber table rows
    function renumber_table(tableID) {
        $(tableID + " tr").each(function() {
            count = $(this).parent().children().index($(this)) + 1;
            $(this).find('.priority').val(count);
        });
    }
}); /*end doc ready*/
</script>