@extends('admin_layout')

@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{ URL::to('/dashboard') }}">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="{{ URL::to('/all-manufacture') }}">Manufactures</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Manufacture</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <p class="alert-success">
            <?php
                $message=Session::get('message');
                if($message)
                {
                    echo $message;
                    Session::put('message',null);
                }
            ?>
        </p>
        <div class="box-content">
            <form class="form-horizontal" action="{{ url('/update-manufacture',$manufacture_info->manufacture_id) }}" method="post" >
                {{ csrf_field() }}
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Manufacture Name </label>
                  <div class="controls">
                    <input type="text" name="manufacture_name" class="input-xlarge" id="typeahead" value="{{ $manufacture_info->manufacture_name }}" data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                    <p class="help-block">Start typing to activate auto complete!</p>
                  </div>
                </div>          
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Manufacture Description</label>
                  <div class="controls">
                    <textarea name="manufacture_description" class="cleditor" rows="2">
                        {{ $manufacture_info->manufacture_description }}
                    </textarea>
                  </div>
                </div> 
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update Manufacture</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--
@endsection